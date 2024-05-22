// ignore_for_file: constant_identifier_names
enum MessageStatus {
  //start message
  //information
  INF00001("INF00001", "Thành công"),
  INF00002("INF00002", "Xác thực thành công"),

  //warnning
  WAR00011("WAR00011",
      "Bạn chắc chắn muốn xóa.\nHành động này sẽ không thể hoàn tác."),
  WAR00012("WAR00012",
      "Bạn chắc chắn muốn thoát.\nNhững thay đổi sẽ không được lưu."),

  //error
  ERR00001("ERR00001", "Đã tồn tại"),
  ERR00004("ERR00004", "Xây dựng chuỗi chứng thực không thành công"),
  ERR00007("ERR00007", "Đã có lỗi xảy ra, vui lòng liên lạc với quản trị viên"),
  ERR00010("ERR00010", "Update không thành công!"),
  ERR00011("ERR00011", "E-mail hoặc mật khẩu không hợp lệ!"),
  ERR00002("ERR00002", "Dữ liệu không hợp lệ"),
  ERR00003("ERR00003", "Đăng ký dữ liệu không thành công")
  //end message
  ;

  const MessageStatus(this.id, this.text);

  final String id;
  final String text;
}
