const { where } = require("sequelize");
const CategoryModel = require("../model/categories.model");

exports.getAll = async () => {
  const cursorCategory = await CategoryModel.findAll();
  return await cursorCategory[0].dataValues;
};

exports.findByName = async (name) => {
  return await find({
    name: { $regex: new RegExp(new RegExp(name)), $options: "i" },
  });
};
exports.create = async (payload) => {
  const payloadResult = extractCategoryData(payload);
  const category = await CategoryModel.findOrCreate(payloadResult);
  return category;
};

exports.update = async (data, id) => {
  const category = await CategoryModel.update(data, {
    where: { id: id },
  });
  return category;
};

exports.delete = async (id) => {
  try {
    const record = await CategoryModel.findByPk(id);
    await record.destroy();
    return true; // Hoặc bạn có thể trả về thông báo khác để cho biết xóa thành công
  } catch (error) {
    return false;
  }
   
};

exports.findById = async (id) => {
  try {
    const record = await CategoryModel.findByPk(id);
    return record;
  } catch (error) {
    return false;
  }
   
};

const find = async (filter) => {
  const cursorCategory = await CategoryModel.find(filter);
  return await cursorCategory[0].dataValues;
};
// Định nghĩa các phương thức truy xuất CSDL sử dụng mongodb API
const extractCategoryData = (payload) => {
  const category = {
    where: { name: payload.name },
    defaults: { description: payload.description },
  };
  return category;
};
