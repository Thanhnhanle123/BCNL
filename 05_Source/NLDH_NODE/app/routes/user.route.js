var   express              = require("express");
var   router               = express.Router();
// const userController       = require(__path_controllers + "user.controller");
// const passport             = require('passport');
// require(__path_middlewares + "authPassportJwt");

// Đăng ký user
router.post('/signup', userController.signUp);
// Đăng nhập user
// router.post('/signin',
//             passport.authenticate('local', {session: false}),
//             userController.signIn);

// router.get('/secret' , passport.authenticate('jwt', {session: false}) , userController.secret);

module.exports = router;