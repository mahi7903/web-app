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
        $query = $model->like('name', $name);
        if ($sideEffect) $query->like('side_effects', $sideEffect);
        if ($purpose) $query->like('purpose', $purpose);
        $meds = $query->findAll();

        if (!empty($meds)) {
            return view('PainResult', ['meds' => $meds, 'source' => 'db']);
        }

        $fields = ['openfda.brand_name', 'openfda.generic_name', 'openfda.substance_name', 'description'];
        $data = [];

        foreach ($fields as $field) {
            $url = 'https://api.fda.gov/drug/label.json?limit=10&search=' . $field . ':' . urlencode($name);
            $response = @file_get_contents($url);
            $data = json_decode($response, true);
            if (!empty($data['results'])) break;
        }

        $apiMeds = [];
        if (!empty($data['results'])) {
            foreach ($data['results'] as $item) {
                $imagePath = FCPATH . 'images/' . strtolower($name) . '.jpg';
                $apiMeds[] = [
                    'name'         => strtoupper($name),
                    'purpose'      => $item['purpose'][0] ?? 'No purpose info available',
                    'side_effects' => $item['adverse_reactions'][0] ?? 'No side effects info',
                    'image_url'    => file_exists($imagePath)
                        ? '/images/' . strtolower($name) . '.jpg'
                        : base_url('images/no-image.jpg')
                ];
            }
        }

        return view('PainResult', ['apiMeds' => $apiMeds, 'searched' => $name, 'source' => 'api']);
    }

    public function save()
    {
        $model = new MedicineModel();
        $data = [
            'name'         => $this->request->getPost('name'),
            'purpose'      => $this->request->getPost('purpose'),
            'side_effects' => $this->request->getPost('side_effects'),
            'image_url'    => $this->request->getPost('image_url')
        ];

        if ($model->insert($data)) {
            return redirect()->to('/pain')->with('success', 'Medicine saved to pharmacy!');
        } else {
            return redirect()->to('/pain')->with('error', 'Failed to save medicine.');
        }
    }
}
