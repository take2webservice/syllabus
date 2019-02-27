/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/app.js":
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__("./resources/assets/js/sample.js");

/***/ }),

/***/ "./resources/assets/js/sample.js":
/***/ (function(module, exports) {

window.onload = function () {
    var has_teacher_select = document.querySelector("#teacher_select");
    var has_selected_teachers = document.querySelector("#selected_teachers");
    var add_teacher_btn = document.querySelector("#add_teacher_btn");

    function removeTeacher(e) {
        e.target.parentElement.parentElement.remove();
    }

    function addTeacher() {
        //重複チェック
        var s = new Set();
        document.querySelectorAll(".teacher_id").forEach(function (e) {
            s.add(e.value);
        });
        var selected = document.querySelector('#teacher_select');
        var index = selected.selectedIndex;
        if (s.has(selected.options[index].value)) {}
        //return;

        //追加処理
        var li = document.createElement("li");
        li.classList.add("list-group-item");
        li.setAttribute("style", "padding: 1em");
        var div = document.createElement("div");
        div.classList.add("row");
        var name_div = document.createElement("div");
        name_div.classList.add("col-sm-3");
        name_div.setAttribute("style", "line-height: 36px;");
        name_div.innerText = selected.options[index].text;
        var input = document.createElement("input");
        input.type = "hidden";
        input.value = selected.options[index].value;
        input.name = "teacher_id[]";
        input.classList.add("teacher_id");
        var del_btn = document.createElement("button");
        del_btn.type = "button";
        del_btn.classList.add("btn");
        del_btn.classList.add("btn-danger");
        del_btn.classList.add("col-sm-2");
        del_btn.classList.add("remove_teacher_btn");
        del_btn.onclick = function (e) {
            removeTeacher(e);
        };
        del_btn.innerHTML = "削除";
        div.appendChild(name_div);
        div.appendChild(input);
        div.appendChild(del_btn);
        li.appendChild(div);
        has_selected_teachers.appendChild(li);
        //削除処理の設定
    }

    if (has_teacher_select !== null && has_selected_teachers !== null && add_teacher_btn !== null) {
        var remove_btns = document.querySelectorAll(".remove_teacher_btn");
        remove_btns.forEach(function (btn) {
            btn.onclick = function (e) {
                removeTeacher(e);
            };
        });
        add_teacher_btn.onclick = function (e) {
            addTeacher();
        };
    }
    //削除処理の設定
};

//     <div class="row">
//       <div class='col-sm-3' style='line-height: 36px;'>井関健人</div>
//       <input type="hidden" value='1' name="teacher_id[]"
//       <button type='button' class="btn btn-danger col-sm-2">削除</button>
//     </div>

/***/ }),

/***/ "./resources/assets/sass/app.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__("./resources/assets/js/app.js");
module.exports = __webpack_require__("./resources/assets/sass/app.scss");


/***/ })

/******/ });