module.exports = function() {
  //noinspection JSAnnotator
  return {
    template: `
      <div class="alert alert-info">
            <button type="button" class="close"  >
              <span aria-hidden="true">&times;</span>
            </button>
        	  <p>
        	      {{ title }} <b ng-transclude></b>
            </p>
        </div>
    `,
    replace: false,
    restrict: 'AE',
    scope: {
      title: '@title'
    },
    transclude: true
  };
};