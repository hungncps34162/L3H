</nav>
  <!-- <?php foreach ($dsLoaiDM as $dm) : ?>
    <li class="nav-item ">
        <div class="dropdown">
            <a class="btn btn-dark dropdown-toggle fw-bold fs-5"data-bs-toggle="dropdown" aria-expanded="false" data-bs-theme="dark"> <?=$dm['TenDM']?>
            
            </a>
            <ul class="dropdown-menu ">
                <?php foreach($dsDMById as $dsdm) :?>
                    <?php if ($dm['MaDM'] == $dsdm['MaLoaiDM']) : ?>
                        <li><a class="dropdown-item" href="<?=$base_url?>admin/category/detail/<?=$dsdm['MaDM']?>"><?=$dsdm['TenDM']?></a></li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </div>
    </li>
  <?php endforeach; ?> -->
            <div class="container">
              <a href="<?=$base_url?>admin/category/add" class="btn btn-info text-light float-end fw-bold rounded-0"><i class="fa-solid fa-plus"></i></a>
                <h2 class="my-3 ">DANH MỤC</h2>
                <table class="table text-center align-middle">
                  <thead>
                    <tr>
                        <th>STT</th>
                        <td>MÃ DANH MỤC</td>
                        <th>TÊN DANH MỤC</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php $i=1; foreach ($dsDMById as $dm): ?>
                    <tr>
                      <td><?=$i?></td>
                      <td><?=$dm['MaDM']?></td>
                      <td ><?=$dm['TenDM']?></td>
                      <td class="text-end">
                        <a class="btn btn-warning rounded-0" href="<?=$base_url?>admin/category/edit/<?=$dm['MaDM']?>"><i class="fa-solid fa-pen-to-square"></i></a>
                        <button onclick="deleteCD(<?=$dm['MaDM']?>)" class="btn btn-danger rounded-0" href="<?=$base_url?>admin/category/delete/<?=$dm['MaDM']?>"><i class="fa-solid fa-trash"></i></button>
                      </td>
                      
                    </tr>
                  <?php $i++; endforeach; ?>

                  </tbody>
                </table>
            </div>
            <script >
              function deleteCD(MaCD){
                var kq = confirm('Bạn có chắc chắn muốn xóa Danh mục này không?');
                if(kq){
                  window.location= '<?=$base_url?>admin/category/delete/'+MaCD;
                }
                
              }
            </script>