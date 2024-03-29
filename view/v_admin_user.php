</nav>
            <div class="container">
              <a href="<?=$base_url?>admin/user/add" class="btn btn-info text-light fw-bold rounded-0 float-end"><i class="fa-solid fa-plus"></i></a>
              <h3 class="my-3 fw-bold ">TÀI KHOẢN</h3>
                <table class="table text-center align-middle">
                  <thead>
                    <tr>
                      <th>STT</th>
                        <th>Ảnh</th>
                        <th class="text-start">HỌ & TÊN</th>
                        <th>SỐ ĐIỆN THOẠI</th>
                        <th>VAI TRÒ</th>
                        <th class="text-end">HÀNH ĐỘNG</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php $i=1; foreach ($dsTK as $tk): ?>
                    <tr>
                      <td><?=$i?></td>
                      <td><img class="rounded-3" src="<?=$base_url?>upload/avatart/<?=$tk['HinhAnh']?>" width="40px" alt=""></td>
                      <td class="text-start"><?=$tk['HoTen']?></td>
                      <td><?=$tk['SoDienThoai']?></td>
                    
                      <td> 
                          <?php 
                            switch ($tk['VaiTro']) {
                              case '2':
                                echo '<span class="badge text-bg-danger w-50 rounded-0">Quản lý cấp cao</span>';
                                break;
                              case '1':
                                echo '<span class="badge text-bg-success w-50 rounded-0">Quản lý</span>';
                                break;

                              default:
                                echo '<span class="badge text-bg-primary w-50 rounded-0">khách hàng</span>';
                                break;
                            }
                          ?>
                        </td>
                      <td class="text-end">
                        <a class="btn btn-warning rounded-0" href="<?=$base_url?>admin/user/edit/<?=$tk['MaTK']?>"><i class="fa-solid fa-pen-to-square"></i></a>
                        <button onclick="deleteUser(<?=$tk['MaTK']?>)" class="btn btn-danger rounded-0" href="<?=$base_url?>admin/user/delete/<?=$tk['MaTK']?>"><i class="fa-solid fa-trash"></i></button>
                      </td>
                      
                    </tr>
                  <?php $i++; endforeach; ?>

                  </tbody>
                </table>
            </div>
            <script >
              function deleteUser(MaTK){
                var kq = confirm('Bạn có chắc chắn muốn xóa tài khoản này không?');
                if(kq){
                  window.location= '<?=$base_url?>admin/user/delete/'+MaTK;
                }
                
              }
            </script>