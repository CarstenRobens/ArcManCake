class AppExceptionRenderer extends ExceptionRenderer {
    protected function _getController($exception) {
        App::uses('SuperCustomError', 'Controller');
        return new SuperCustomErrorController();
    }
}