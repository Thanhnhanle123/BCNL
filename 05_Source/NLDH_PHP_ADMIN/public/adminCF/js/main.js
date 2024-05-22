function actionDelete(event) {
  event.preventDefault();
  let urlRequest = $(this).data("url");
  let that = $(this);
  Swal.fire({
    title: "Bạn có chắc muốn xóa?",
    text: "",
    icon: "Cảnh báo",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Vâng!",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "Get",
        url: urlRequest,
        success: function (data) {
          if (data.code == 200) {
            // that.parent().parent().remove();
            location.reload();
            Swal.fire("Đã xóa!", "Dữ liệu đã được xóa.", "Thành công");
          }
        },
        error: function (e) {
          Swal.fire("Lỗi!", e.responseJSON.message, "error");
        },
      });
    }
  });
}

function actionNav() {
  let that = $(this);
  localStorage.setItem(
    "activeNavItem",
    that.parent()[0].attributes.id.nodeValue
  );
}

$(function () {
  $(document).on("click", ".action_delete", actionDelete);
});

$(function () {
  $(document).on("click", ".nav-link", actionNav);
});
$(document).ready(function () {
  console.log(localStorage.getItem("activeNavItem"));
  var active = document.getElementById(localStorage.getItem("activeNavItem"));
  if (active != null) {
    $(active).addClass("active-nav-item");
  }

  setTimeout(function () {
    var successMessage = document.getElementById("successMessage");
    if (successMessage != undefined) {
      successMessage.style.display = "none";
    }
  }, 3000); // 2 giây// 2 giây

  $(".select2").select2({
    placeholder: "Chọn vai trò",
  });
});
