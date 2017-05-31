/**
 * Created by ADMIN on 21/03/2017.
 */

function confirmDelete(url) {
  var result = confirm('Are you sure you want to delete?');

  if (result) {
    window.location.href = url;
    return true;
  } else {
    return false;
  }
}