<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\OrderModel;

class OrderController extends BaseController
{
    use ResponseTrait;
    protected $db;
    protected $security;
    private $model;
    protected $helpers = ['form'];
    public function __construct()
    {
        $this->model = new OrderModel();
        $this->db = \Config\Database::connect();
        $this->security = \Config\Services::security();
    }
    public function index()
    {


        $customers = $this->db
            ->table('customers')
            ->select('id, name')
            ->get()->getResultArray();
        // dd($data);

        return view("admin/order/all", [
            'customers' => $customers,
            'security' => $this->security
        ]);
    }
    public function all()
    {
        $builder = $this->db->table('myorder');
        $builder->select('myorder.*,customers.name as cname');
        $builder->join('customers', 'customers.id = myorder.customer_id', 'inner');
        $data = $builder->get()->getResultArray();

        return $this->respond($data, 200);
    }
    public function details($id)
    {
        $query = $this->db->table('order_details')
            ->select('order_details.*, products.name as pname, products.price as pprice')
            ->join('products', 'products.id = order_details.product_id', 'inner')
            ->where('order_details.order_id', $id);

        $data = $query->get()->getResultArray();

        $query = $this->db->table('myorder')
            ->select('myorder.*, customers.name as cname')
            ->join('customers', 'customers.id = myorder.customer_id', 'inner')
            ->where('myorder.id', $id);

        $result = $query->get()->getRow();

        if ($result !== null) {
            $info = get_object_vars($result);
        } else {
            $info = null;
        }

        return view('admin/order/details', compact('data', 'info'));
    }

    public function delete()
    {
        $request = request();
        $id = $request->getPost('id');
        $builder = $this->db->table('myorder');
        if ($builder->delete(['id' => $id])) {
            return $this->respond([
                'success' => true,
                'message' => "Data Deleted Successfully"
            ], 200);
        } else {
            return $this->respond([
                'success' => false,
                'message' => "Error deleting Subcategory!!"
            ], 200);
        }
    }
}
