/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/game/sprites/Dude.js":
/*!****************************************!*\
  !*** ./resources/game/sprites/Dude.js ***!
  \****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); Object.defineProperty(subClass, "prototype", { writable: false }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }

function _createSuper(Derived) { var hasNativeReflectConstruct = _isNativeReflectConstruct(); return function _createSuperInternal() { var Super = _getPrototypeOf(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = _getPrototypeOf(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return _possibleConstructorReturn(this, result); }; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } else if (call !== void 0) { throw new TypeError("Derived constructors may only return object or undefined"); } return _assertThisInitialized(self); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], function () {})); return true; } catch (e) { return false; } }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

var Dude = /*#__PURE__*/function (_Phaser$GameObjects$S) {
  _inherits(Dude, _Phaser$GameObjects$S);

  var _super = _createSuper(Dude);

  function Dude(config) {
    var _this;

    _classCallCheck(this, Dude);

    _this = _super.call(this, config.scene, config.x, config.y, 'dude');

    _defineProperty(_assertThisInitialized(_this), "jumpCount", 0);

    config.scene.physics.world.enable(_assertThisInitialized(_this));
    config.scene.add.existing(_assertThisInitialized(_this));
    _this.body.maxVelocity.x = 160;
    _this.body.maxVelocity.y = 200;
    return _this;
  }

  _createClass(Dude, [{
    key: "update",
    value: function update(cursors) {
      this.cursors = cursors;
      this.createPlayer();
      this.createCursor();
    }
  }, {
    key: "createPlayer",
    value: function createPlayer() {
      this.body.setBounce(0.2);
      this.body.setCollideWorldBounds(true);
      this.anims.create({
        key: 'left',
        frames: this.anims.generateFrameNumbers('dude', {
          start: 0,
          end: 3
        }),
        frameRate: 10,
        repeat: -1
      });
      this.anims.create({
        key: 'turn',
        frames: [{
          key: 'dude',
          frame: 4
        }],
        frameRate: 20
      });
      this.anims.create({
        key: 'right',
        frames: this.anims.generateFrameNumbers('dude', {
          start: 5,
          end: 8
        }),
        frameRate: 10,
        repeat: -1
      });
    }
  }, {
    key: "createCursor",
    value: function createCursor() {
      if (this.cursors.left.isDown) {
        this.run(-this.body.maxVelocity.x);
        this.anims.play('left', true);
      } else if (this.cursors.right.isDown) {
        this.run(this.body.maxVelocity.x);
        this.anims.play('right', true);
      } else {
        this.run(0);
        this.anims.play('turn', true);
      } //Doble Salto 


      var isJumpJustDown = Phaser.Input.Keyboard.JustDown(this.cursors.up);
      var isTounchingGround = this.body.touching.down;

      if (isJumpJustDown && (isTounchingGround || this.jumpCount < 2)) {
        this.jumpCount++;
        this.body.setVelocityY(-this.body.maxVelocity.y);
      }

      if (isTounchingGround && !isJumpJustDown) {
        this.jumpCount = 0;
      }
    }
  }, {
    key: "run",
    value: function run(vel) {
      this.body.setVelocityX(vel);
    }
  }]);

  return Dude;
}(Phaser.GameObjects.Sprite);

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Dude);

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
(() => {
/*!*****************************************!*\
  !*** ./resources/game/scenes/Level1.js ***!
  \*****************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Level1)
/* harmony export */ });
/* harmony import */ var _sprites_Dude__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../sprites/Dude */ "./resources/game/sprites/Dude.js");
function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); Object.defineProperty(subClass, "prototype", { writable: false }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }

function _createSuper(Derived) { var hasNativeReflectConstruct = _isNativeReflectConstruct(); return function _createSuperInternal() { var Super = _getPrototypeOf(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = _getPrototypeOf(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return _possibleConstructorReturn(this, result); }; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } else if (call !== void 0) { throw new TypeError("Derived constructors may only return object or undefined"); } return _assertThisInitialized(self); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], function () {})); return true; } catch (e) { return false; } }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }



var Level1 = /*#__PURE__*/function (_Phaser$Scene) {
  _inherits(Level1, _Phaser$Scene);

  var _super = _createSuper(Level1);

  function Level1() {
    _classCallCheck(this, Level1);

    return _super.call(this, {
      key: 'Level1'
    });
  }

  _createClass(Level1, [{
    key: "preload",
    value: function preload() {
      this.load.image('sky', 'game/assets/forest.png');
      this.load.image('ground', 'game/assets/platform.png');
      this.load.spritesheet('dude', 'game/assets/dude.png', {
        frameWidth: 32,
        frameHeight: 48
      });
    }
  }, {
    key: "create",
    value: function create() {
      this.physics.world.checkCollision.down = false;
      this.crevasse = this.add.zone(600, 3200, 3200, 600);
      this.physics.world.enable(this.crevasse, Phaser.Physics.Arcade.STATIC_BODY);
      this.add.image(400, 300, 'sky').setScrollFactor(0, 0);
      this.createPlatform();
      this.dude = new _sprites_Dude__WEBPACK_IMPORTED_MODULE_0__["default"]({
        scene: this,
        key: 'dude',
        x: 100,
        y: 500
      });
      this.cameras.main.setBounds(0, 0, 3200, 600, true, true, true, false);
      this.physics.world.setBounds(0, 0, 3200, 600, true, true, true, false);
      this.cameras.main.startFollow(this.dude);
    }
  }, {
    key: "update",
    value: function update() {
      this.cursors = this.input.keyboard.createCursorKeys();
      this.dude.update(this.cursors);
      this.physics.add.collider(this.dude, this.platforms);
    }
  }, {
    key: "createPlatform",
    value: function createPlatform() {
      this.platforms = this.physics.add.staticGroup({
        classType: Phaser.Physics.Arcade.Image,
        defaultKey: 'ground'
      });
      this.platforms.create(400, 595, 'ground').setScale(2).refreshBody();
      this.platforms.create(400, 450, 'ground');
      this.platforms.create(25, 325, 'ground');
      this.platforms.create(750, 300, 'ground');
    }
  }]);

  return Level1;
}(Phaser.Scene);


})();

/******/ })()
;