</nav>
            <div class="container">
              
                <h3 class="my-3 text-center fw-bold ">QUẢN LÝ BÀI VIẾT</h3>
                <table class="table text-center align-middle">
                  <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên bài viết</th>
                        <th>Ngày</th>
                        <th class="text-end">Hành động</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $i=1;  foreach ($dsblog as $bv): ?>
                    <tr>
                      <td><?=$i?></td>
                      <td><?=$bv['NoiDung'] ?></td>
                      <td><?=$bv['NgayGui'] ?></td>
                      <td><?=$bv['MaSP'] ?></td>
                      <td class="text-end">
                      <button onclick="deleteBL(<?=$bv['MaBV']?>)" class="btn btn-danger" href="<?=$base_url?>admin/post/delete/<?=$bv['MaBV']?>"><i class="fa-solid fa-trash"></i></button>
                      </td>
                    </tr>
                  <?php $i++; endforeach;?>

                  </tbody>
                </table>
            </div>
            <script >
              function deleteBL(MaBV){
                var kq = confirm('Bạn có chắc chắn muốn xóa bài viết này không?');
                if(kq){
                  window.location= '<?=$base_url?>admin/post/delete/'+MaBV;
                }
                
              }
            </script>