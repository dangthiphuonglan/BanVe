<?php

namespace App\Repositories;

interface MainRepositoryInterface
{
    /**
     * Get's a post by it's ID
     *
     * @param int
     */
    public function get($post_id);

    /**
     * Get's all posts.
     *
     * @return mixed
     */
    public function all();

    /**
     * Deletes a post.
     *
     * @param int
     */
    public function delete($post_id);

    /**
     * Updates a post.
     *
     * @param int
     * @param array
     */
    public function update($post_id, array $post_data);

    /**
     * Get's a user by it's email
     *
     * @param int
     */
    public function getUser($email);

    public function getAllDanhMuc();

    public static function getDanhMucById($id_danhmuc);

    public function getAllTietMuc();

    public function getTietMucById($id_tietmuc);

    public function getAllLichChieu();

    public function getAllUser();

    public function getUserById($id);
    public function getLichChieuById($id);
    public function getVeByIdLichChieu($id);

    public function getVeById($id);

    public function sendMail($contact);
    public function getAllVe();

    public function xoaLichChieu($idLichChieu);

    public function getAllHoaDon();
    public function getHoaDonByid($id);

    public function forgotpas($pass);

    public function xoaVe($pass);

    public function sendHoaDon($hoadon);

}

?>