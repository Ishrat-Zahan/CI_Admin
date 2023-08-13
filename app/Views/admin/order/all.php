<?= $this->extend('layouts/dashboard') ?>
<?= $this->section('content') ?>
<h1 class="text-center text-primary">Order Management</h1>
<hr>

<div class="d-flex justify-content-start ms-3">
    <span>
        <button class="btn btn-primary" id="showFormBtn"><i class="fa-solid fa-plus"></i></button>
    </span>
</div>

<hr>
<table class="table table-striped table-hover table-sm">


    <thead>
        <tr>
            <th>ID</th>
            <th>Customer_id</th>
            <th>Biling Address</th>
            <th>Shipping Address</th>
            <th>Total</th>
            <th>Status</th>
            <th>Discount</th>
            
            <th>Actions</th>
      
        </tr>
    </thead>
    <tbody id="maindata">

    </tbody>

</table>
<?= $this->endSection('content') ?>
<?= $this->section('script') ?>

<script>

    $(document).ready(function(){

        function showdata(d) {
            console.log(d);
            $html = ``;
            $.each(d, function(index, row) {

                $html += `<tr class='singlerow'>`;
                $html += `<td>${row.id}</td>`;
                $html += `<td>${row.cname}</td>`;
                $html += `<td>${row.b_address}</td>`;
                $html += `<td>${row.s_address}</td>`;
                $html += `<td class='sn'>${row.total}</td>`;
                $html += `<td class='sn'>${row.status}</td>`; 
                $html += `<td class='sn'>${row.discount}</td>`;
                          

                $html += `<td><a href='javascript:void(0)' class='editBtn btn btn-primary' data-id='${row.id}'>Edit</a>
                <a href='javascript:void(0)' class='deleteBtn btn btn-danger' data-id='${row.id}'>Delete</a>
                <a href='<?= base_url("admin/order/details/") ?>${row.id}' class='detailBtn btn btn-success'>Details</a>   
                </td>`;
              
                $html += `</tr>`;
            });
            $("#maindata").html($html);


        }

        function loaddata() {
            $.getJSON("<?= base_url(); ?>admin/order/all", function(data) {
                showdata(data);

            });

        }
        loaddata();
    });
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
                            
                    $.post("<?= site_url("admin/order/delete") ?>", {
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


</script>
<?= $this->endSection('script') ?>