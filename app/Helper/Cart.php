<?php

namespace App\Helper;

class Cart
{

    /********************************************
     * @var $items là mảng gồm các sản phẩm trong giỏ hàng
     */
    public $items = [];

    /********************************************
     * @var $totalPrice là tổng giá trị tiền trong giỏ hàng
     */
    public $totalPrice = 0;

    /********************************************
     * @var $totalQuanity là tổng giá trị số lựng sản phẩm trong giỏ hàng
     */
    public $totalQuantity = 0;

    public function __construct()
    {
        /********************************************
         * giá trị khởi tạo cho các thuộc tính
         * @var $item sẽ lấy từ session('cart')
         * @var totalPrice được tính toán từ phương thức getTotalPrice
         * @var totalQuanity được tính toán từ phương thức getTotalQuanity
         */
        $this->items = session('cart') ? session('cart') : [];
        $this->totalPrice = $this->getTotalPrice();
        $this->totalQuantity = $this->getTotalQuantity();
    }

    /********************************************
     * phương thức add xử lý thêm mới sản phẩm và giỏ hàng
     * @var $product là tham số dữ liệu sản phẩm đầu vào
     * @var $quantity là tham số số lượng thêm mới, mặc định là 1
     */
    public function add($product, $quantity = 1)
    {
        $id = $product->id;
        /** Kiểm tra nếu đã có sản phẩm trong giỏ hàng rồi */
        if (isset($this->items[$id])) {
            $this->items[$id]->quantity += $quantity; // tăng số lượng lên
        } else {
            // nếu chwua thì tiến hành lưu vào sesion
            $item = [
                'id' => $product->id,
                'name' => $product->name,
                'image' => $product->image,
                'price' => $product->sale_price ? $product->sale_price : $product->price,
                'quantity' => $quantity,
            ];
            // thêm sản phẩm vào mảng $items, chuyển về dạng object
            $this->items[$id] = (object) $item;
        }
        /** Lưu lại session giỏ hàng */
        session(['cart' => $this->items]);
    }

    /********************************************
     * Phương thức xóa sản phẩm khỏi giỏ hàng
     * @var @id là tham số id cảu sản phẩm
     */
    public function delete($id)
    {
        if (isset($this->items[$id])) {
            unset($this->items[$id]); // Loại bỏ sản phẩm khỏi mảng
            /** Lưu lại session giỏ hàng */
            session(['cart' => $this->items]);
        }
    }

    /********************************************
     * Phương thức update cập nhật số lượng sản phẩm khỏi giỏ hàng
     * @var @id là tham số id cảu sản phẩm
     * @var $quantity số lượng cần cập nhật
     */
    public function update($id, $quantity)
    {
        /** Kiểm tra nếu đã có sản phẩm trong giỏ hàng rồi */
        if (isset($this->items[$id])) {
            $this->items[$id]->quantity = $quantity; // tăng hoặc giảm số lượng lên
        }
    }

    /********************************************
     * Phương thức xóa toàn bộ sản phẩm trong giỏ hàng
     */
    public function clear()
    {
        $this->items = [];
        session(['cart' => null]);
    }

    /********************************************
     * Phương thức tính toán trả về tổng tiền trong giỏ hàng
     */
    private function getTotalPrice()
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->quantity * $item->price;
        }

        return $total;
    }

    /********************************************
     * Phương thức tính toán trả về tổng số lượng trong giỏ hàng
     */
    private function getTotalQuantity()
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->quantity;
        }

        return $total;
    }
}
