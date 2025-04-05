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
        helper('text'); // for character_limiter
        $request = service('request');

        $name = $request->getGet('medicine_name');
        $sideEffect = $request->getGet('side_effect');
        $purpose = $request->getGet('purpose');

        $model = new MedicineModel();

        // DB SEARCH FIRST
        $query = $model->like('name', $name);
        if ($sideEffect) $query->like('side_effects', $sideEffect);
        if ($purpose) $query->like('purpose', $purpose);
        $meds = $query->findAll();

        if (!empty($meds)) {
            return view('PainResult', ['meds' => $meds, 'source' => 'db']);
        }

        // API FALLBACK
        $apiUrl = 'https://api.fda.gov/drug/label.json?limit=10&search=openfda.brand_name:' . urlencode($name);
        $response = @file_get_contents($apiUrl);
        $data = json_decode($response, true);

        $apiMeds = [];
        if (isset($data['results'])) {
            foreach ($data['results'] as $item) {
                $apiMeds[] = [
                    'name' => $name,
                    'purpose' => $item['purpose'][0] ?? 'N/A',
                    'side_effects' => $item['adverse_reactions'][0] ?? 'N/A'
                ];
            }
        }

        return view('PainResult', ['apiMeds' => $apiMeds, 'searched' => $name, 'source' => 'api']);
    }

    // Optional: Save API result to DB
    public function save()
    {
        $model = new MedicineModel();
        $data = [
            'name' => $this->request->getPost('name'),
            'purpose' => $this->request->getPost('purpose'),
            'side_effects' => $this->request->getPost('side_effects'),
            'image_url' => $this->request->getPost('image_url') ?? 'https://via.placeholder.com/150x100?text=Medicine'
        ];
        
        $model->save($data);
        return redirect()->to('/pain')->with('success', 'Medicine saved to pharmacy!');
    }
}
