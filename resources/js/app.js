import './bootstrap';
import 'bootstrap';
import $ from 'jquery';
import * as bootstrap from 'bootstrap';
import 'bootstrap-table';
import 'bootstrap-table/dist/extensions/filter-control/bootstrap-table-filter-control.min.js';

import flatpickr from "flatpickr";
import "flatpickr/dist/flatpickr.min.css";
import { Spanish } from "flatpickr/dist/l10n/es.js";



import Swal from 'sweetalert2';
window.bootstrap = bootstrap;
window.flatpickr = flatpickr;
window.Spanish = Spanish;
window.jQuery = $;
window.Swal = Swal;
window.$ = $;

async function getFormData(elements) {
    let data = new FormData();
    Array.from(elements).forEach(element => {
        if (element.hasAttribute("name")) {
            if (element.type === "file") {
                if (element.multiple) {
                    Array.from(element.files).forEach(file => {
                        data.append(element.name, file); // use name[] for array-like keys
                    });
                } else {
                    if (element.files[0]) {
                        data.append(element.name, element.files[0]);
                    }
                }
            } else {
                data.append(element.name, element.value);
            }
        }
    });
    return data;
}

window.getFormData=getFormData;