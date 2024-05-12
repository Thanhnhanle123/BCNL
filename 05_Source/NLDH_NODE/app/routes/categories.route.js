const express = require("express");
const categoriesController = require("../controllers/categories.controller");

const router = express.Router();

router
  .route("/")
  // this is get categories all
  .get(categoriesController.getAll)
  // this is post categories
  // method: post
  .post(categoriesController.create);

router
  .route("/:id")
  .put(categoriesController.update)
// this is update category
// method: put
  .delete(categoriesController.delete)
// this is delete category
// method: delete
.get(categoriesController.findOne);
// this is find category by id
// method: get

module.exports = router;
