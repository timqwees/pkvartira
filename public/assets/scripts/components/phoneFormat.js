document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('input[data-type-phone]').forEach(function (input) {
        input.addEventListener('input', function (e) {
            let value = e.target.value.replace(/\D/g, '');

            if (e.target.value.includes('+7')) {
                value = '9' + value.substring(1);
            } else if (value.length > 0 && (value[0] === '8' || (value[0] >= '0' && value[0] <= '6') || value[0] === '9')) {
                value = '9' + value.substring(1);
            }

            if (value.length > 0) {
                let formatted = '';
                if (value.length >= 1) formatted += '(' + value.substring(0, 3);
                if (value.length >= 4) formatted += ') ' + value.substring(3, 6);
                if (value.length >= 7) formatted += '-' + value.substring(6, 8);
                if (value.length >= 9) formatted += '-' + value.substring(8, 10);

                e.target.value = formatted;
            } else {
                e.target.value = '';
            }
        });
    });
});
