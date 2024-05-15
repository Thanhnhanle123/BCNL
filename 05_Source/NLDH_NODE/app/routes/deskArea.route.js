const express = require("express");
const deskAreaController = require("../controllers/deskArea.controller");

const router = express.Router();

router
  .route("/")
  // this is get deskArea all
  .get(deskAreaController.getAll)
  // this is post deskArea
  // method: post
  .post(deskAreaController.create);

router
  .route("/:id")
  .put(deskAreaController.update)
// this is update category
// method: put
  .delete(deskAreaController.delete)
// this is delete category
// method: delete
.get(deskAreaController.findOne);
// this is find category by id
// method: get

module.exports = router;
