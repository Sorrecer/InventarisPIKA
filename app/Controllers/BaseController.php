<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
    }

    protected function notif()
    {
        $notif = [];
        $db = \Config\Database::connect();
        $sql = "SELECT B.nama_barang,
        IF(K.jum IS NULL, M.jum, M.jum-K.jum) AS Jumlah, R.nama_ruang, B.jumlah_minimal

        FROM
        (SELECT id_barang, id_ruang, sum(jumlah_barang) AS jum
        FROM barang_masuk
        GROUP BY id_barang, id_ruang) M

        LEFT JOIN

        (SELECT id_barang, id_ruang, sum(jumlah_barang) AS jum
        FROM barang_keluar
        GROUP BY id_barang, id_ruang) K

        ON M.id_barang = K.id_barang
        AND M.id_ruang = K.id_ruang

        LEFT JOIN barang B
        ON M.id_barang = B.id_barang

        LEFT JOIN ruang R
        ON M.id_ruang = R.id_ruang
        GROUP BY M.id_barang, M.id_ruang;
        ";
        $q = $db->query($sql);
        $hasil = $q->getResultArray();
        foreach ($hasil as $rowhasil) {
            if ($rowhasil['Jumlah'] < $rowhasil['jumlah_minimal'] && $rowhasil['Jumlah'] > 0) {
                array_push($notif, $rowhasil);
            }
        }
        return $notif;
    }
}
