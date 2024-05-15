var express = require("express");
var router = express.Router();

// this is api categories
router.use('/categories', require('./categories.route'));
router.use('/desk-area', require('./deskArea.route'));

module.exports = router;