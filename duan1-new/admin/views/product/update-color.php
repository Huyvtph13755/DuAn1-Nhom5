<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Cập nhật màu sắc</h3>
            </div>
            <div class="card-body">
                <form action="<?= ADMIN_URL . 'danh-muc/luu-tao-moi' ?>" method="post">
                    <div class="col-6 offset-3">
                        <div class="form-group">
                            <label for="">Tên màu sắc: </label>
                            <input type="text" value="<?= $upc['name_color']?>" name="name_color" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                          <label for="">Giá thêm (đồng): </label>
                          <input type="number" value="<?= $upc['price_add']?>" name="price_add" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                          <label for="">Số lượng: </label>
                          <input type="number" value="<?= $upc['quantity']?>" name="quantity" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <br>
                        <div class="d-flex justify-content-center">
                            <a href="<?= ADMIN_URL . 'product/detail-product?product_id='.$_GET['product_id'] ?> " class="btn btn-sm btn-danger" style="width: 50%; font-weight: bold;" >Hủy</a>
                            &nbsp;
                            <button type="submit" style="width: 50%; font-weight: bold;" class="btn btn-sm btn-primary">Lưu</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>