<?php

namespace App\Controllers;
use App\Models\MedicineModel;
use CodeIgniter\Controller;

class PainController extends BaseController
{
    public function index()
    {
        $sort = $this->request->getGet('sort_by') ?? 'name';
        $model = new MedicineModel();
        $meds = $model->orderBy($sort, 'ASC')->limit(12)->findAll();

        return view('Pain', [
            'meds' => $meds,
            'sort_by' => $sort
        ]);
    }

    public function search()
    {
        helper('text');
        $request = service('request');

        $name = $request->getGet('medicine_name');
        $sideEffect = $request->getGet('side_effect');
        $purpose = $request->getGet('purpose');

        $model = new MedicineModel();

        // Search from DB first
        $query = $model->like('name', $name);
        if ($sideEffect) $query->like('side_effects', $sideEffect);
        if ($purpose) $query->like('purpose', $purpose);
        $meds = $query->findAll();

        if (!empty($meds)) {
            return view('PainResult', ['meds' => $meds, 'source' => 'db']);
        }

        // Try multiple OpenFDA fields for better results
        $fields = ['openfda.brand_name', 'openfda.generic_name', 'openfda.substance_name', 'description'];
        $response = null;
        $data = [];

        foreach ($fields as $field) {
            $url = 'https://api.fda.gov/drug/label.json?limit=10&search=' . $field . ':' . urlencode($name);
            $response = @file_get_contents($url);
            $data = json_decode($response, true);
            if (!empty($data['results'])) {
                break;
            }
        }

        $apiMeds = [];
        if (!empty($data['results'])) {
            foreach ($data['results'] as $item) {
                $apiMeds[] = [
                    'name'         => strtoupper($name),
                    'purpose'      => $item['purpose'][0] ?? 'No purpose info available',
                    'side_effects' => $item['adverse_reactions'][0] ?? 'No side effects info',
                    'image_url'    => '/images/' . strtolower($name) . '.jpg'
                ];
            }
        }

        return view('PainResult', ['apiMeds' => $apiMeds, 'searched' => $name, 'source' => 'api']);
    }

    public function save()
    {
        if ($this->request->isAJAX()) {
            $model = new MedicineModel();

            $data = [
                'name'         => $this->request->getPost('name'),
                'purpose'      => $this->request->getPost('purpose'),
                'side_effects' => $this->request->getPost('side_effects'),
                'image_url'    => $this->request->getPost('image_url')
            ];

            // Log incoming AJAX data for debug
            log_message('info', 'AJAX Save Request: ' . json_encode($data));

            try {
                if ($model->insert($data)) {
                    return $this->response->setJSON(['status' => 'success']);
                } else {
                    return $this->response->setJSON([
                        'status' => 'error',
                        'message' => $model->errors()
                    ]);
                }
            } catch (\Exception $e) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => $e->getMessage(),
                    'data' => $data
                ]);
            }
        }

        return redirect()->to('/pain');
    }

    public function ajaxSearch()
    {
        $name = $this->request->getPost('query');
        $model = new MedicineModel();
        $results = $model->like('name', $name)->limit(6)->findAll();
        return $this->response->setJSON($results);
    }
}
