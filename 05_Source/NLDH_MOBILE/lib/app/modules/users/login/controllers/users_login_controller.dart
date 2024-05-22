import 'package:flutter/widgets.dart';
import 'package:get/get.dart';

class UsersLoginController extends GetxController {
  final usernameController = TextEditingController();
  final passwordController = TextEditingController();
  final isLoading = false.obs;
  final isPasswordVisible = false.obs;

  void togglePasswordVisibility() {
    isPasswordVisible.value = !isPasswordVisible.value;
  }

  void login() async {
    isLoading.value = true;
    // Add your login logic here. For example:
    // bool success = await AuthService.login(usernameController.text, passwordController.text);
    await Future.delayed(Duration(seconds: 2)); // Simulate network delay
    isLoading.value = false;
    // Handle login result, e.g., navigate to another screen or show error
    // if (success) {
    //   Get.offAll(HomePage());
    // } else {
    //   Get.snackbar('Error', 'Login failed');
    // }
  }

  @override
  void onClose() {
    usernameController.dispose();
    passwordController.dispose();
    super.onClose();
  }
}
