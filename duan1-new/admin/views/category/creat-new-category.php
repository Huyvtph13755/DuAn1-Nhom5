<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tạo mới danh mục</h3>
            </div>
            <div class="card-body">
                <form action="<?= ADMIN_URL . 'danh-muc/luu-tao-moi'?>" method="post">
                    <div class="col-6 offset-3">
                        <div class="form-group">
                          <label for="">Tên danh mục</label>
                          <input type="text" name="name_category" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <br>
                        <div class="d-flex justify-content-center">
                            <a href="<?= ADMIN_URL . 'category' ?> " class="btn btn-sm btn-danger" style="width: 50%; font-weight: bold;" >Hủy</a>
                            &nbsp;
                            <button type="submit" style="width: 50%; font-weight: bold;" class="btn btn-sm btn-primary">Tạo mới</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>