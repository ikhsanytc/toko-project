<?php

namespace App\Controllers;

use App\Models\Account;
use App\Models\Clothes;
use App\Models\Keranjang;
use App\Models\Transaction;

class Home extends BaseController
{
    protected $account;
    protected $clothes;
    protected $keranjang;
    protected $transaction;
    public function __construct()
    {
        $this->account = new Account();
        $this->clothes = new Clothes();
        $this->keranjang = new Keranjang();
        $this->transaction = new Transaction();
    }
    public function index()
    {

        return view('pages/home', [
            'title' => 'Home',
            'clothes' => $this->clothes->findAll(3)
        ]);
    }
    public function detail_product($slug, $uuid)
    {
        // dd($slug, $uuid);
        $clothe = $this->clothes->where('slug', $slug)->where('uuid_product', $uuid)->first();
        return view('pages/detail_product', [
            'title' => 'Detail Product',
            'clothe' => $clothe
        ]);
    }
    public function login()
    {
        return view('pages/login', [
            'title' => 'Login'
        ]);
    }
    public function loginProcess()
    {
        $name = $this->request->getVar('name');
        $password = $this->request->getVar('password');
        $name = $this->account->where('name', $name)->first();

        if ($name) {
            if (password_verify($password, $name['password'])) {
                setcookie('login', $name['uuid'], strtotime('+30 days'), '/');
                return redirect()->to(base_url('/'))->with('pesan', 'Selamat Datang ' . $name['name']);
            } else {
                return redirect()->to(base_url('/login'))->with('error', 'Password salah!');
            }
        } else {
            return redirect()->to(base_url('/login'))->with('error', 'Username tidak ada!');
        }
    }
    public function register()
    {
        return view('pages/register', [
            'title' => 'Register'
        ]);
    }
    public function produk()
    {
        return view('pages/produk', [
            'title' => 'Produk kami'
        ]);
    }
    public function keranjang()
    {
        $items = $this->keranjang->where('uuid_user', $_COOKIE['login'])->findAll();
        return view('pages/keranjang', [
            'title' =>  'Keranjang kamu',
            'items' => $items,
        ]);
    }
    public function keranjangProcess()
    {
        $uuid_product = $this->request->getVar('uuid');
        $product = $this->clothes->where('uuid_product', $uuid_product)->first();
        $uuid_user = $_COOKIE['login'];
        $quantity = $this->request->getVar('quantity');
        $img = $product['img'];
        $name = $product['name_product'];
        $price = $product['price'];

        $this->keranjang->save([
            'uuid_user' => $uuid_user,
            'uuid_product' => $uuid_product,
            'quantity' => $quantity,
            'img' => $img,
            'name_product' => $name,
            'price' => $price
        ]);
        return redirect()->to(base_url('/detail/' . $product['slug'] . '/' . $uuid_product))->with('pesan', 'Berhasil di tambahkan ke keranjang!!');
    }
    public function cancelPay()
    {
        $id = $this->request->getVar('id');
        $this->keranjang->delete($id);
        return redirect()->to(base_url('/keranjang'))->with('pesan', 'Berhasil di hapus dari keranjang');
    }
    public function pay($uuid, $id, $snapToken = null)
    {
        if ($snapToken === null) {
            $transaction = $this->keranjang->where('uuid_user', $_COOKIE['login'])->where('id', $id)->where('uuid_product', $uuid)->first();
            \Midtrans\Config::$serverKey = 'SB-Mid-server-YeX2ZnSzuV3rPvqtnBPA3hzc';
            // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            \Midtrans\Config::$clientKey = 'SB-Mid-client-quBukbD404YhkGjS';
            \Midtrans\Config::$isProduction = false;
            // Set sanitization on (default)
            \Midtrans\Config::$isSanitized = true;
            // Set 3DS transaction for credit card to true
            \Midtrans\Config::$is3ds = true;
            // dd($transaction);
            $item1_details = array(
                'id' => $transaction['id'],
                'price' => $transaction['price'],
                'quantity' => $transaction['quantity'],
                'name' => $transaction['name_product']
            );
            $params = array(
                'transaction_details' => array(
                    'order_id' => rand(),
                    'gross_amount' => $transaction['price'] * $transaction['quantity'],
                ),
                'item_details' => array($item1_details)
            );

            $snapToken = \Midtrans\Snap::getSnapToken($params);
            return view('pages/pay', [
                'title' => 'Bayar',
                'snapToken' => $snapToken,
                'transaction' => $transaction,
                'status' => 'checkout'
            ]);
        } else {
            $transaction = $this->transaction->where('uuid_user', $_COOKIE['login'])->where('id', $id)->where('uuid_product', $uuid)->first();
            \Midtrans\Config::$serverKey = 'SB-Mid-server-YeX2ZnSzuV3rPvqtnBPA3hzc';
            // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            \Midtrans\Config::$clientKey = 'SB-Mid-client-quBukbD404YhkGjS';
            \Midtrans\Config::$isProduction = false;
            // Set sanitization on (default)
            \Midtrans\Config::$isSanitized = true;
            // Set 3DS transaction for credit card to true
            \Midtrans\Config::$is3ds = true;

            $snapToken = $snapToken;
            return view('pages/pay_transaction', [
                'title' => 'Bayar',
                'snapToken' => $snapToken,
                'transaction' => $transaction,
                'status' => 'pending',
            ]);
        }
        // dd($transaction);

    }
    public function payProcess()
    {
        $snapToken = $this->request->getVar('snapToken');
        $price = $this->request->getVar('price');
        $status = $this->request->getVar('status');
        $uuid_product = $this->request->getVar('uuid_product');
        $uuid_user = $this->request->getVar('uuid_user');
        $order_id = $this->request->getVar('order_id');
        $payment_type = $this->request->getVar('payment_type');
        $gross_amount = $this->request->getVar('gross_amount');
        $img = $this->request->getVar('img');
        $name_product = $this->request->getVar('name_product');
        $quantity = $this->request->getVar('quantity');

        if ($status == 'settlement') {
            $id = $this->request->getVar('id');
            if ($this->transaction->where('order_id', $order_id)->first()) {
                $transaction = $this->transaction->where('order_id', $order_id)->first();
                $this->transaction->save([
                    'id' => $transaction['id'],
                    'uuid_product' => $uuid_product,
                    'uuid_user' => $uuid_user,
                    'status' => $status,
                    'order_id' => $order_id,
                    'payment_type' => $payment_type,
                    'gross_amount' => $gross_amount,
                    'img' => $img,
                    'name_product' => $name_product,
                    'quantity' => $quantity,
                    'price' => $price,
                    'snapToken' => $snapToken
                ]);
                // $keranjang = $this->keranjang->where('uuid_user', $uuid_user)->where('uuid_product', $uuid_product)->first();
                $this->keranjang->delete($id);
            } else {
                $this->transaction->save([
                    'uuid_product' => $uuid_product,
                    'uuid_user' => $uuid_user,
                    'status' => $status,
                    'order_id' => $order_id,
                    'payment_type' => $payment_type,
                    'gross_amount' => $gross_amount,
                    'img' => $img,
                    'name_product' => $name_product,
                    'quantity' => $quantity,
                    'price' => $price,
                    'snapToken' => $snapToken
                ]);
                // $keranjang = $this->keranjang->where('uuid_user', $uuid_user)->where('uuid_product', $uuid_product)->first();
                $this->keranjang->delete($id);
            }

            return session()->setFlashdata('pesan', 'Berhasil di bayar, terima kasih :)');
        } elseif ($status == 'pending') {
            $id = $this->request->getVar('id');
            if (!$this->transaction->where('id', $id)->first()) {
                $this->transaction->save([
                    'uuid_product' => $uuid_product,
                    'uuid_user' => $uuid_user,
                    'status' => $status,
                    'order_id' => $order_id,
                    'payment_type' => $payment_type,
                    'gross_amount' => $gross_amount,
                    'img' => $img,
                    'name_product' => $name_product,
                    'quantity' => $quantity,
                    'price' => $price,
                    'snapToken' => $snapToken
                ]);
            }
            return session()->setFlashdata('pesan', 'Ayo cepat bayar, keburu expired loh');
        }
    }
    public function payProcessPending()
    {
        $snapToken = $this->request->getVar('snapToken');
        $price = $this->request->getVar('price');
        $status = $this->request->getVar('status');
        $uuid_product = $this->request->getVar('uuid_product');
        $uuid_user = $this->request->getVar('uuid_user');
        $order_id = $this->request->getVar('order_id');
        $payment_type = $this->request->getVar('payment_type');
        $gross_amount = $this->request->getVar('gross_amount');
        $img = $this->request->getVar('img');
        $name_product = $this->request->getVar('name_product');
        $quantity = $this->request->getVar('quantity');
        // dd($this->request->getVar('id'));
        $this->transaction->save([
            'uuid_product' => $uuid_product,
            'uuid_user' => $uuid_user,
            'status' => $status,
            'order_id' => $order_id,
            'payment_type' => $payment_type,
            'gross_amount' => $gross_amount,
            'img' => $img,
            'name_product' => $name_product,
            'quantity' => $quantity,
            'price' => $price,
            'snapToken' => $snapToken
        ]);
        $transaction = $this->transaction->where('snapToken', $snapToken)->first();
        return session()->set('id_transaction', $transaction['id']);
    }
    public function payTransaction($uuid_product, $id, $snapToken)
    {
        $this->keranjang->delete($id);
        $transaction = $this->transaction
            ->where('uuid_product', $uuid_product)
            ->where('snapToken', $snapToken)->first();
        return view('pages/pay_transaction', [
            'title' => 'Bayar',
            'transaction' => $transaction,
            'snapToken' => $snapToken,
        ]);
    }
    public function transaction()
    {
        $transactions = $this->transaction->where('uuid_user', $_COOKIE['login'])->findAll();
        return view('pages/transaction', [
            'title' => 'Transaksi kamu',
            'transactions' => $transactions
        ]);
    }
    public function transactionDetail($uuid_user, $order_id)
    {
        $user = $this->account->where('uuid', $uuid_user)->first();
        // dd($user);
        $transaction = $this->transaction->where('uuid_user', $uuid_user)->where('order_id', $order_id)->first();
        return view('pages/transaction_detail', [
            'title' => 'Transaksi ' . $transaction['name_product'],
            'transaction' => $transaction,
            'user' => $user,
        ]);
    }
}
