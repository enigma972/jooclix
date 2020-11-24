if (!Object.prototype.debug) {
    Object.prototype.debug = function () {
        var text = 'Object {\n';

        for (var i in this) {
            if (i !== 'debug') {
                text += ' [' + i + '] => ' + this[i] + '\n';
            }
        }
        alert(text + '}');
    }
}