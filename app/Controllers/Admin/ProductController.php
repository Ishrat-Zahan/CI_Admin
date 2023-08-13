<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use CodeIgniter\Files\File;
use App\Models\CategoryModel;
use CodeIgniter\API\ResponseTrait;

class ProductController extends BaseController
{

    use ResponseTrait;
    protected $db;
    protected $security;
    private $model;
    protected $helpers = ['form'];
    public function __construct()
    {
        $this->model = new ProductModel();
        $this->db = \Config\Database::connect();
        $this->security = \Config\Services::security();
    }
    public function index()
    {

        $cats = $this->db
            ->table('categories')
            ->select('id, name')
            ->get()->getResultArray();
        $subcats = $this->db
            ->table('subcategories')
            ->select('id, name')
            ->get()->getResultArray();


        return view("admin/product/all", [
            'cats' => $cats,
            'subcats' => $subcats,
            'security' => $this->security
        ]);
    }

    public function all()
    {

        $builder = $this->db->table('products');
        $builder->select('products.*,categories.name as catname,subcategories.name as subcatname',);
        $builder->join('categories', 'categories.id = products.category_id', 'inner');
        $builder->join('subcategories', 'subcategories.id = products.subcategory_id', 'inner');
        $data = $builder->get()->getResultArray();
        // dd($data);

        return $this->respond($data, 200);
    }

    public function create()
    {
        $c = new CategoryModel();
        $data['cats'] = $c->select("id,name")->findAll();



        $validation = \Config\Services::validation();
        if (!$this->request->is('post')) {
            return view('admin/product/create', $data);
        }
        $rules = [
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'name' => 'required|min_length[5]|',
            'description' => 'required|min_length[10]',
            'sku' => 'required|is_unique[products.sku]',
            'images' => [
                'label' => 'Image File',
                'rules' => [
                    'uploaded[images]',
                    'is_image[images]',
                    'mime_in[images,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    'max_dims[images,10024,7068]',
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            $errors = $validation->getErrors();
            return $this->response->setJSON(['status' => 'error', 'errors' => $errors]);
        }
        $request = request();
        $img = $this->request->getFile('images');
        //file upload

        $imagename = "";
        if (!$img->hasMoved()) {
            $imagename = $img->store();


            $filepath = WRITEPATH . 'uploads/productimg' . $imagename;
            $data = ['uploaded_fileinfo' => new File($filepath)];
        }
        //file upload end
        $arr = [
            'category_id' => $request->getPost('category_id'),
            'subcategory_id' => $request->getPost('subcategory_id'),
            'sku' => $request->getPost('sku'),
            'name' => $request->getPost('name'),
            'description' => $request->getPost('description'),
            'price' => $_POST['price'],
            'price2' => $_POST['newprice'],

            'quantity' => $_POST['quantity'],
            'discount' => $_POST['discount'],
            'hot' => isset($_POST['hot']) ? $_POST['hot'] : 0,
        ];

        $this->model->insert($arr);

        $pid = $this->model->getInsertID();
        $data = [
            "product_id" => $pid,
            'name' => $imagename
        ];
        $db      = \Config\Database::connect();
        $builder = $db->table('images');
        $builder->insert($data);

        return $this->response->setJSON(['status' => 'success', 'message' => "Product Added to Database"]);
    }

    public function delete()
    {
        $request = request();
        $id = $request->getPost('id');
        $builder = $this->db->table('products');
        if ($builder->delete(['id' => $id])) {
            return $this->respond([
                'success' => true,
                'message' => "Data Deleted Successfully"
            ], 200);
        } else {
            return $this->respond([
                'success' => false,
                'message' => "Error deleting product!!"
            ], 200);
        }
    }
}
