<?= $this->extend('layouts/dashboard') ?>
<?= $this->section('content') ?>
<h1 class="text-center text-primary">Product Management</h1>
<hr>

<div class="d-flex justify-content-start ms-3">
    <span>
        <button class="btn btn-primary" id="showFormBtn"><i class="fa-solid fa-plus"></i></button>
    </span>
</div>

<hr>
<?= validation_list_errors() ?>

<?= form_open_multipart('admin/product/create', ['class' => "form", "id" => "productForm"]) ?>


<div class="mb-3">
    <label for="category_id" class="form-label">Category ID</label>
    <select class="form-select" id="category_id" name="category_id">
        <option value="-1">Select</option>
        <?php
        foreach ($cats as $row) {
            echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
        }
        ?>
    </select>
</div>

<div class="mb-3">
    <label for="subcategory_id" class="form-label">Subcategory ID</label>
    <select class="form-select" id="subcategory_id" name="subcategory_id">
        <option value="1">hi</option>
    </select>
</div>

<div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" name="name" value="<?= set_value('name') ?>">
</div>

<div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea class="form-control" id="description" name="description">
                <?= set_value('description') ?>
                </textarea>
</div>

<div class="mb-3">
    <label for="sku" class="form-label">SKU</label>
    <input type="text" class="form-control" id="sku" name="sku" value="<?= set_value('sku') ?>">
</div>

<div class="mb-3">
    <label for="images" class="form-label">Images</label>
    <input type="file" class="form-control" id="images" name="images">
</div>

<div class="mb-3">
    <label for="price" class="form-label">Price</label>
    <input type="text" class="form-control" id="price" name="price" value="<?= set_value('price') ?>">
</div>

<div class="mb-3">
    <label for="newprice" class="form-label">New Price</label>
    <input type="text" class="form-control" id="newprice" name="newprice" value="<?= set_value('newprice') ?>">
</div>

<div class="mb-3">
    <label for="quantity" class="form-label">Quantity</label>
    <input type="text" class="form-control" id="quantity" name="quantity" value="<?= set_value('quantity') ?>">
</div>

<div class="mb-3">
    <label for="discount" class="form-label">Discount</label>
    <input type="text" class="form-control" id="discount" name="discount" value="<?= set_value('discount') ?>">
</div>

<div class="mb-3">
    <label for="hot" class="form-label">Hot</label>
    <input type="checkbox" class="form-check-input" id="hot" name="hot" value="1">
</div>

<button type="submit" id="addProduct" class="btn btn-primary">Add Product</button>

<?= form_close() ?>

<br>


<table class="table table-striped table-hover table-sm">


    <thead>
        <tr>
            <th>ID</th>
            <th>Category</th>
            <th>Sub-category</th>
            <th>Name</th>
            <th>SKU</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Discount</th>
            <th>Create Time</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody id="maindata">

    </tbody>

</table>

<?= $this->endSection('content') ?>
<?= $this->section('script') ?>

<script>
    $(document).ready(function() {

        function renderSubCat(data) {
            data.forEach(row => {
                $("#subcategory_id").append("<option value='" + row.id + "'>" + row.name + "</option>")
            });
        }

        $("#category_id").change(function() {
            $("#subcategory_id").empty();
            let id = $(this).val();
            if (id == "-1") return;
            $.getJSON("<?= base_url("getsubcat/") ?>" + id, {}, function(d) {
                console.log(d);
                if (d.length) {
                    renderSubCat(d);
                }
            });
        })

        $(".form").hide();
        $("#showFormBtn").click(function() {
            $(".form").toggle(300);
        });


        // .................add........
        $('#productForm').submit(function(e) {
            e.preventDefault(); 

            var formData = new FormData(this);

            $.ajax({
                url: "<?= base_url("admin/product/create") ?>", 
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                    if (response.status == "success") {
                        alert(response.message) 
                    }
                }
            });
        });
        //......................... add end...........

        //...................... manage.................
        function showdata(d) {
            // console.log(d);
            $html = ``;
            $.each(d, function(index, row) {

                $html += `<tr class='singlerow'>`;
                $html += `<td>${row.id}</td>`;
                $html += `<td>${row.catname}</td>`;
                $html += `<td>${row.subcatname}</td>`;
                $html += `<td>${row.name}</td>`;
                $html += `<td class='sn'>${row.sku}</td>`;
                $html += `<td class='sn'>${row.price}</td>`;
                $html += `<td class='sn'>${row.quantity}</td>`;
                $html += `<td class='sn'>${row.discount}</td>`;
                $html += `<td>${row.created_at}</td>`;

                $html += `<td><a href='javascript:void(0)' class='editBtn btn btn-primary' data-id='${row.id}'>Edit</a><a href='javascript:void(0)' class='deleteBtn btn btn-danger' data-id='${row.id}'>Delete</a></td>`;
                $html += `</tr>`;
            });
            $("#maindata").html($html);


        }

        function loaddata() {
            $.getJSON("<?= base_url(); ?>admin/product/all", function(data) {
                showdata(data);

            });

        }
        loaddata();
        // ...............................manage end...............
        // ...............................deleteBtn start...............

        $("#maindata").on("click", ".deleteBtn", function() {
            $t = $(this);
            $id = $t.data("id");
            // console.log($id);

            Swal.fire({
                title: 'Do you want to delete the record??',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'Delete',
                denyButtonText: `Don't delete`,
            }).then((result) => {
                console.log(result);
              
                if (result.isConfirmed) {
                            
                    $.post("<?= site_url("admin/product/delete") ?>", {
                        'id': $id,
                        'action': "delete"
                    }, function(d) {
                        if (d.success) {
                            Swal.fire(
                                'Good job!',
                                d.message,
                                'success'
                            ).then(() => {
                                loaddata();
                            })
                        }

                    })
                    
                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info')
                }
            })
            // swal end     
        });
    });
</script>
<?= $this->endSection('script') ?>