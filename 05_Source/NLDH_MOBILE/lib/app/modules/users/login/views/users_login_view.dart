import 'package:flutter/material.dart';
import 'package:get/get.dart';

import '../controllers/users_login_controller.dart';

class UsersLoginView extends GetView<UsersLoginController> {
  const UsersLoginView({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    final _formKey = GlobalKey<FormState>();

    return Scaffold(
      body: SingleChildScrollView(
        child: Center(
          child: Padding(
            padding: const EdgeInsets.all(16.0),
            child: Form(
              key: _formKey,
              child: Column(
                mainAxisAlignment: MainAxisAlignment.center,
                children: [
                  SizedBox(height: 100), // Spacer for centering content
                  const Text("Logo", style: TextStyle(fontSize: 40)),
                  SizedBox(height: 20),
                  const Text("Tiêu đề", style: TextStyle(fontSize: 30)),
                  SizedBox(height: 40),
                  TextFormField(
                    controller: controller.usernameController,
                    decoration: InputDecoration(
                      labelText: 'Tên đăng nhập',
                      border: OutlineInputBorder(),
                      prefixIcon: Icon(Icons.person),
                    ),
                    validator: (value) {
                      if (value == null || value.isEmpty) {
                        return 'Vui lòng nhập tên đăng nhập';
                      }
                      return null;
                    },
                  ),
                  SizedBox(height: 20),
                  Obx(() {
                    return TextFormField(
                      controller: controller.passwordController,
                      decoration: InputDecoration(
                        labelText: 'Mật khẩu',
                        border: OutlineInputBorder(),
                        prefixIcon: Icon(Icons.lock),
                        suffixIcon: IconButton(
                          icon: Icon(
                            controller.isPasswordVisible.value
                                ? Icons.visibility
                                : Icons.visibility_off,
                          ),
                          onPressed: controller.togglePasswordVisibility,
                        ),
                      ),
                      obscureText: !controller.isPasswordVisible.value,
                      validator: (value) {
                        if (value == null || value.isEmpty) {
                          return 'Vui lòng nhập mật khẩu';
                        }
                        return null;
                      },
                    );
                  }),
                  SizedBox(height: 40),
                  ElevatedButton(
                    onPressed: () {
                      if (_formKey.currentState!.validate()) {
                        controller.login();
                      }
                    },
                    child: const Text("Đăng nhập"),
                  ),
                  SizedBox(height: 20),
                  Obx(() {
                    if (controller.isLoading.value) {
                      return CircularProgressIndicator();
                    }
                    return SizedBox.shrink();
                  }),
                ],
              ),
            ),
          ),
        ),
      ),
    );
  }
}
