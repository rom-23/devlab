import '../webComponents/modal/pp-modal.component';
import '../webComponents/accordion/aria.accordion.min';
import '../webComponents/multi-select/multi-input.component';
import MultiSelect2 from "../class/multi-select2";

// execute le multi-select de la class MultiSelect2
(function(){
   return new MultiSelect2(".autocomplete-select", {
      options: [
        {
          label: "English",
          value: "En"
        },
        {
          label: "Arabic",
          value: "Ar"
        },
        {
          label: "English 1",
          value: "En1"
        },
        {
          label: "Arabic1",
          value: "Ar1"
        },
        {
          label: "English2",
          value: "En2"
        },
        {
          label: "Arabic2",
          value: "Ar2"
        },
        {
          label: "Arabic3",
          value: "Ar3"
        },
        {
          label: "English3",
          value: "En3"
        },
        {
          label: "Arabic3",
          value: "Ar3"
        },
      ],
      value: [],
      multiple: true,
      autocomplete: true,
      icon: "fa fa-times",
      onChange: value => {
        console.log(value);
      },
  })})();

// initialise le web-component multi-select
const getButton = document.getElementById('get');
const multiInput = document.querySelector('multi-input');
const values = document.querySelector('#values');

getButton.onclick = () => {
  if (multiInput.getValues().length > 0) {
    values.textContent = `Got ${multiInput.getValues().join(' and ')}!`;
  } else {
    values.textContent = 'Got noone  :`^(.';
  }
};
document.querySelector('input').focus();
