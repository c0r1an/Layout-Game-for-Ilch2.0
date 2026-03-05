(function () {
    function initAccordion() {
        var form = document.getElementById('advsettings_form');
        if (!form || form.dataset.gameAccordionReady === '1') {
            return;
        }

        var headers = Array.prototype.slice.call(form.querySelectorAll('h2'));
        if (!headers.length) {
            return;
        }

        form.dataset.gameAccordionReady = '1';

        var sections = headers.map(function (header) {
            var rows = [];
            var node = header.nextElementSibling;

            while (node && node.tagName !== 'H2') {
                if (node.classList && node.classList.contains('row') && node.classList.contains('mb-3')) {
                    rows.push(node);
                }
                node = node.nextElementSibling;
            }

            header.classList.add('btn', 'btn-outline-secondary', 'w-100', 'text-start', 'mb-2');
            header.setAttribute('role', 'button');
            header.setAttribute('tabindex', '0');

            var indicator = document.createElement('span');
            indicator.className = 'float-end';
            indicator.textContent = '+';
            header.appendChild(indicator);

            return {
                header: header,
                rows: rows,
                indicator: indicator
            };
        });

        function setOpen(indexToOpen) {
            sections.forEach(function (section, index) {
                var isOpen = index === indexToOpen;
                section.rows.forEach(function (row) {
                    row.hidden = !isOpen;
                });
                section.indicator.textContent = isOpen ? '-' : '+';
                section.header.classList.toggle('btn-secondary', isOpen);
                section.header.classList.toggle('btn-outline-secondary', !isOpen);
            });
        }

        sections.forEach(function (section, index) {
            function toggle() {
                var isOpen = section.rows.length > 0 && section.rows[0].hidden === false;
                setOpen(isOpen ? -1 : index);
            }

            section.header.addEventListener('click', toggle);
            section.header.addEventListener('keydown', function (event) {
                if (event.key === 'Enter' || event.key === ' ') {
                    event.preventDefault();
                    toggle();
                }
            });
        });

        setOpen(0);
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initAccordion);
    } else {
        initAccordion();
    }
})();
