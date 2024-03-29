<h3 class="fw-bold text-center my-3" >QUẢN LÍ ĐƠN HÀNG</h3>
<table class="table text-center">
  <thead>
    <tr>
      <th>MÃ HÓA ĐƠN</th>
      <th>MÃ TÀI KHOẢN</th>
      <th>SỐ LƯỢNG</th>
      <th>THÀNH TIỀN</th>
      <th>TRẠNG THÁI</th>
      <th>XEM CHI TIẾT</th>
      <th>NGÀY ĐẶT</th>
      <th>HÀNH ĐỘNG</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($dsHoaDon as $item): ?>
    <tr>
      <td><?=$item['MaHD']?></td>
      <td><?=$item['MaTK']?></td>
      <td><?=$item['SoLuongSP']?></td>
      <td><?=$item['TongTien']?></td>
      <td>
        <?php switch ($item['TrangThai']) {
          case 'dat-hang':
            echo '<span class="badge text-bg-primary">Đặt hàng</span>';
            break;
          case 'dang-xu-ly':
            echo '<span class="badge text-bg-success">Đang xử lý</span>';
            break;
          case 'da-giao':
            echo '<span class="badge text-bg-success">Đã giao</span>';
            break;
          
          default:
            break;
        }
        ?>
      </td>
        <td>
          <a class="btn btn-info rounded-0" href="<?=$base_url?>admin/history/view/<?=$item['MaHD']?>">Xem</a>
        </td>
      <td ><?=$item['NgayDat']?></td>
      <td>
        <a class="btn btn-info rounded-0" href="<?=$base_url?>admin/history/edit/<?=$item['MaHD']?>"><i class="fa-solid fa-pen-to-square"></i></a>
        <a class="btn btn-danger rounded-0" href="<?=$base_url?>admin/history/delete/<?=$item['MaHD']?>"><i class="fa-solid fa-trash"></i></a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>