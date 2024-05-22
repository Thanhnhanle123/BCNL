import 'dart:convert';
import 'dart:developer' as developer;
import 'dart:io';

import 'package:http/http.dart' as http;
import 'package:shared_preferences/shared_preferences.dart';

import 'api_config.dart';
import 'c_constant.dart';
import 'c_message.dart';

class ApiConnector {
  factory ApiConnector() => _instance;

  ApiConnector._internal();

  static final ApiConnector _instance = ApiConnector._internal();
  String apiUrl = "$host/api";

  String apiUrlImage = "$host/image/";

  static String bearToken = "";
  void setToken(String token) {
    bearToken = "Bearer $token";
  }

  debugLog(http.Response res) {
    developer.log(
        "API: (${res.statusCode}) [${res.request?.method}] ${res.request?.url ?? ''}",
        name: 'APPLOG');
  }

  /// <summary>
  /// request to API with GET method
  /// </summary>
  dynamic get(String callURL, bool isAsync) async {
    //if isAsync is true then API not Authorization
    if (!isAsync) {
      final pref = await SharedPreferences.getInstance();
      setToken("${pref.getString(kTokenKey)}");
    }
    String url = "$apiUrl/$callURL";

    Map<String, String> headers = {
      "Content-type": "application/json",
      "Accept": "*/*",
      if (!isAsync) "Authorization": bearToken
    };
    try {
      var response = await http.get(
        Uri.parse(url),
        headers: headers,
      );

      debugLog(response);

      return checkRequestStatusCode(response);
    } catch (e) {
      return {
        'resultCode': MessageStatus.ERR00007.id,
        'message': MessageStatus.ERR00007.text,
        'data': null
      };
    }
  }

  /// <summary>
  /// request to API with POST method
  /// </summary>
  dynamic post(String callURL, String bodyData, bool isAsync) async {
    String url = "$apiUrl/$callURL";
    if (!isAsync) {
      final pref = await SharedPreferences.getInstance();
      setToken("${pref.getString(kTokenKey)}");
    }
    Map<String, String> headers = {
      "Content-type": "application/json",
      "Accept": "*/*",
      if (!isAsync) "Authorization": bearToken
    };
    try {
      var response =
          await http.post(Uri.parse(url), headers: headers, body: bodyData);
      debugLog(response);

      return checkRequestStatusCode(response);
    } catch (e) {
      return {
        'resultCode': MessageStatus.ERR00007.id,
        'message': MessageStatus.ERR00007.text,
        'data': null
      };
    }
  }

  /// <summary>
  /// request to API with PUT method
  /// </summary>
  dynamic put(String callURL, String bodyData, bool isAsync) async {
    String url = "$apiUrl/$callURL";
    if (!isAsync) {
      final pref = await SharedPreferences.getInstance();
      setToken("${pref.getString(kTokenKey)}");
    }
    Map<String, String> headers = {
      "Content-type": "application/json",
      "Accept": "*/*",
      if (!isAsync) "Authorization": bearToken
    };
    try {
      var response =
          await http.put(Uri.parse(url), headers: headers, body: bodyData);
      debugLog(response);

      return checkRequestStatusCode(response);
    } catch (e) {
      return {
        'resultCode': MessageStatus.ERR00007.id,
        'message': MessageStatus.ERR00007.text,
        'data': null
      };
    }
  }

  /// <summary>
  /// request to API with DELETE method
  /// </summary>
  dynamic delete(String callURL, bool isAsync) async {
    String url = "$apiUrl/$callURL";
    if (!isAsync) {
      final pref = await SharedPreferences.getInstance();
      setToken("${pref.getString(kTokenKey)}");
    }
    Map<String, String> headers = {
      "Content-type": "application/json",
      "Accept": "*/*",
      if (!isAsync) "Authorization": bearToken
    };
    try {
      var response = await http.delete(Uri.parse(url), headers: headers);

      debugLog(response);

      return checkRequestStatusCode(response);
    } catch (e) {
      return {
        'resultCode': MessageStatus.ERR00007.id,
        'message': MessageStatus.ERR00007.text,
        'data': null
      };
    }
  }

  checkRequestStatusCode(http.Response response) {
    if (response.statusCode == HttpStatus.unauthorized) {
      Map<String, dynamic> newBody = {
        'resultCode': MessageStatus.ERR00004.id,
        'message': MessageStatus.ERR00004.text,
        'data': null
      };
      return newBody;
    } else {
      return jsonDecode(response.body);
    }
  }
}
