const CategoriesService = require("../services/categories.service");
const ApiError = require("../api-error");
const Constants = require("../config/constants");
const commonMsg = require("../config/commonMsg");

exports.getAll = async (req, res, next) => {
  let documents = {};
  const { name } = req.query;
  try {
    if (name) {
      documents = await CategoriesService.getByName();
    } else {
      documents = await CategoriesService.getAll();
    }
  } catch (error) {
    return next(
      new ApiError(500, Constants.INTERNAL_SERVER_ERROR[1])
    );
  }
  const commonMsgApi = new commonMsg(Constants.OK[0]);
  return res.status(200).json(commonMsgApi.apiStatus(documents));
};

exports.create = async (req, res, next) => {
  try {
    // Kiểm tra xem có tồn tại tên không
    if (!req.body?.name) {
      return next(new ApiError(400, `Name ${Constants.NOT_EMPTY[1]}`));
    }

    // Tạo hoặc cập nhật bản ghi
    let document = await CategoriesService.create(req.body);

    // Tạo một thông điệp chung API
    const commonMsgApi = new commonMsg(Constants.CREATED[0]);

    if (!document[1]) {
      // Nếu không tạo mới bản ghi
      const commonMsgApi = new commonMsg(Constants.OK[0]);
      // Cập nhật bản ghi đã tồn tại
      document = await CategoriesService.update(
        req.body,
        document[0].dataValues.id
      );
      var dataResult = "";
      if (document[0] > 0) {
        dataResult = Constants.DATA_UPDATED[1];
      } else {
        dataResult = Constants.DATA_NOT_UPDATE[1];
      }
      return res.status(200).json(commonMsgApi.apiStatus(dataResult));
    }
    // Trả về kết quả thành công với mã trạng thái 201 (Created)
    return res.status(201).json(commonMsgApi.apiStatus(document[0]));
  } catch (error) {
    // Xử lý lỗi nếu có
    return next(
      new ApiError(500, Constants.INTERNAL_SERVER_ERROR[1])
    );
  }
};

exports.update = async (req, res) => {
  if (Object.keys(req.body).length === 0) {
    return next(new ApiError(400, Constants.BAD_REQUEST[1]));
  }
  try {
    const document = await CategoriesService.update(req.body, req.params.id);
    if (!document) {
      return next(new ApiError(400, Constants.BAD_REQUEST[1]));
    }
    const commonMsgApi = new commonMsg(Constants.OK[0]);
    var dataResult = "";
    if (document[0] > 0) {
      dataResult = Constants.DATA_UPDATED[1];
    } else {
      dataResult = Constants.DATA_NOT_UPDATE[1];
    }
    return res.status(200).json(commonMsgApi.apiStatus(dataResult));
  } catch (error) {
    return next(
      new ApiError(500, Constants.INTERNAL_SERVER_ERROR[1])
    );
  }
};

exports.delete = async (req, res, next) => {
  try {
    const { id } = req.params;

    // Gọi phương thức xóa từ CategoriesService
    const deleted = await CategoriesService.delete(id);
    
    if (deleted) {
      const commonMsgApi = new commonMsg(Constants.OK[0]);
      return res
        .status(200)
        .json(commonMsgApi.apiStatus(Constants.OK[1]));
    } else {
      const commonMsgApi = new commonMsg(Constants.NOT_FOUND[0]);
      return res.status(404).json(commonMsgApi.apiStatus(Constants.NOT_FOUND[1]));
    }
  } catch (error) {
    console.error("Error:", error);
    return next(
      new ApiError(500, Constants.INTERNAL_SERVER_ERROR[1])
    );
  }
};

exports.findOne = async (req, res) => {
  try {
    const document = await CategoriesService.findById(req.params.id);
    if (!document) {
      const commonMsgApi = new commonMsg(Constants.NOT_FOUND[0]);
      return res.status(404).json(commonMsgApi.apiStatus(Constants.NOT_FOUND[1]));
    }
    const commonMsgApi = new commonMsg(Constants.OK[0]);
    return res
        .status(200)
        .json(commonMsgApi.apiStatus(document));
  } catch (error) {
    return next(
      new ApiError(500, Constants.NOT_FOUND[1])
    );
  }
};
