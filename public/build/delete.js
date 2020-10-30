(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["delete"],{

/***/ "./assets/delete.js":
/*!**************************!*\
  !*** ./assets/delete.js ***!
  \**************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! core-js/modules/es.object.to-string */ "./node_modules/core-js/modules/es.object.to-string.js");

__webpack_require__(/*! core-js/modules/es.promise */ "./node_modules/core-js/modules/es.promise.js");

var post = document.getElementById('posts');

if (post) {
  post.addEventListener('click', function (e) {
    if (e.target.className === 'btn btn-danger post-delete') {
      if (confirm('Delete?')) {
        var id = e.target.getAttribute('data-id');
        fetch('/post/delete/' + id, {
          method: 'DELETE'
        }).then(function (res) {
          return window.location.reload();
        });
        console.log(id);
      }
    }
  });
}

/***/ })

},[["./assets/delete.js","runtime","vendors~delete"]]]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvZGVsZXRlLmpzIl0sIm5hbWVzIjpbInBvc3QiLCJkb2N1bWVudCIsImdldEVsZW1lbnRCeUlkIiwiYWRkRXZlbnRMaXN0ZW5lciIsImUiLCJ0YXJnZXQiLCJjbGFzc05hbWUiLCJjb25maXJtIiwiaWQiLCJnZXRBdHRyaWJ1dGUiLCJmZXRjaCIsIm1ldGhvZCIsInRoZW4iLCJyZXMiLCJ3aW5kb3ciLCJsb2NhdGlvbiIsInJlbG9hZCIsImNvbnNvbGUiLCJsb2ciXSwibWFwcGluZ3MiOiI7Ozs7Ozs7Ozs7Ozs7QUFBQSxJQUFNQSxJQUFJLEdBQUdDLFFBQVEsQ0FBQ0MsY0FBVCxDQUF3QixPQUF4QixDQUFiOztBQUVBLElBQUdGLElBQUgsRUFBUztBQUNMQSxNQUFJLENBQUNHLGdCQUFMLENBQXNCLE9BQXRCLEVBQStCLFVBQUFDLENBQUMsRUFBSTtBQUNoQyxRQUFHQSxDQUFDLENBQUNDLE1BQUYsQ0FBU0MsU0FBVCxLQUF1Qiw0QkFBMUIsRUFBd0Q7QUFDcEQsVUFBR0MsT0FBTyxDQUFDLFNBQUQsQ0FBVixFQUF1QjtBQUNuQixZQUFNQyxFQUFFLEdBQUdKLENBQUMsQ0FBQ0MsTUFBRixDQUFTSSxZQUFULENBQXNCLFNBQXRCLENBQVg7QUFDSEMsYUFBSyxDQUFDLGtCQUFrQkYsRUFBbkIsRUFBdUI7QUFDeEJHLGdCQUFNLEVBQUU7QUFEZ0IsU0FBdkIsQ0FBTCxDQUVHQyxJQUZILENBRVEsVUFBQUMsR0FBRztBQUFBLGlCQUFJQyxNQUFNLENBQUNDLFFBQVAsQ0FBZ0JDLE1BQWhCLEVBQUo7QUFBQSxTQUZYO0FBR0VDLGVBQU8sQ0FBQ0MsR0FBUixDQUFZVixFQUFaO0FBQ0Y7QUFDSjtBQUNKLEdBVkQ7QUFXSCxDIiwiZmlsZSI6ImRlbGV0ZS5qcyIsInNvdXJjZXNDb250ZW50IjpbImNvbnN0IHBvc3QgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgncG9zdHMnKTtcclxuXHJcbmlmKHBvc3QpIHtcclxuICAgIHBvc3QuYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCBlID0+IHtcclxuICAgICAgICBpZihlLnRhcmdldC5jbGFzc05hbWUgPT09ICdidG4gYnRuLWRhbmdlciBwb3N0LWRlbGV0ZScpIHtcclxuICAgICAgICAgICAgaWYoY29uZmlybSgnRGVsZXRlPycpKSB7XHJcbiAgICAgICAgICAgICAgICBjb25zdCBpZCA9IGUudGFyZ2V0LmdldEF0dHJpYnV0ZSgnZGF0YS1pZCcpO1xyXG4gICAgICAgICAgICAgZmV0Y2goJy9wb3N0L2RlbGV0ZS8nICsgaWQsIHtcclxuICAgICAgICAgICAgICAgICBtZXRob2Q6ICdERUxFVEUnXHJcbiAgICAgICAgICAgICB9KS50aGVuKHJlcyA9PiB3aW5kb3cubG9jYXRpb24ucmVsb2FkKCkpO1xyXG4gICAgICAgICAgICAgICBjb25zb2xlLmxvZyhpZCk7XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9XHJcbiAgICB9KTtcclxufSJdLCJzb3VyY2VSb290IjoiIn0=