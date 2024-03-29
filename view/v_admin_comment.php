</nav>
            <div class="container">
              
                <h3 class="my-3 ">Quản lý bình luận</h3>
                <table class="table text-center align-middle">
                  <thead>
                    <tr>
                        <th>STT</th>
                        <th>Nội Dung</th>
                        <th>Ngày</th>
                        <th>MaSP</th>
                        <th class="text-end">Hành động</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $i=1;  foreach ($dsbinhluanad as $bl): ?>
                    <tr>
                      <td><?=$i?></td>
                      <td><?=$bl['NoiDung'] ?></td>
                      <td><?=$bl['NgayGui'] ?></td>
                      <td><?=$bl['MaSP'] ?></td>
                      <td class="text-end">
                      <button onclick="deleteBL(<?=$bl['MaBL']?>)" class="btn btn-danger" href="<?=$base_url?>admin/comment/delete/<?=$bl['MaBL']?>"><i class="fa-solid fa-trash"></i></button>
                      </td>
                    </tr>
                  <?php $i++; endforeach;?>

                  </tbody>
                </table>
            </div>
            <script >
              function deleteBL(MaBL){
                var kq = confirm('Bạn có chắc chắn muốn xóa bình luận này không?');
                if(kq){
                  window.location= '<?=$base_url?>admin/comment/delete/'+MaBL;
                }
                
              }
            </script>