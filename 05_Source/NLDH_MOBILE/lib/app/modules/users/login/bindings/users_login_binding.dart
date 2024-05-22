import 'package:get/get.dart';

import '../controllers/users_login_controller.dart';

class UsersLoginBinding extends Bindings {
  @override
  void dependencies() {
    Get.lazyPut<UsersLoginController>(
      () => UsersLoginController(),
    );
  }
}
