/**
 * Use this file for JavaScript code that you want to run in the front-end
 * on posts/pages that contain this block.
 *
 * When this file is defined as the value of the `viewScript` property
 * in `block.json` it will be enqueued on the front end of the site.
 *
 * Example:
 *
 * ```js
 * {
 *   "viewScript": "file:./view.js"
 * }
 * ```
 *
 * If you're not making any changes to this file because your project doesn't need any
 * JavaScript running in the front-end, then you should delete this file and remove
 * the `viewScript` property from `block.json`.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-metadata/#view-script
 */

/* eslint-disable no-console */
// console.log(
// 	'Hello World! (from subscription-block-subscription-block block)'
// );
/* eslint-enable no-console */

(function () {
	document.addEventListener("DOMContentLoaded", () => {
		bitcoin(); // run on page load
		setInterval(bitcoin, 60000); // set interval (1 min)
		fetchRates(); // on button click
	});
})();

/**
 * Manual call API bitcoin rate by button click
 */
const fetchRates = () => {
	const btns = document.querySelectorAll(".bitcoin-rate-fetch");

	btns.forEach((btn) => {
		btn.addEventListener("click", () => {
			bitcoin();

			// Disable btn to prevent multiple pending quieries.
			btn.disabled = true;
		});
	});
};

const bitcoin = async () => {
	const url = "https://api.coindesk.com/v1/bpi/currentprice.json";

	try {
		const response = await fetch(url);
		const json = await response.json();
		const currencyRates = json.bpi;

		pasteBitcoinRate(currencyRates);
	} catch (error) {
		console.warn("Bitcoin Price API error:", error);
	}
};

const pasteBitcoinRate = (currencyRates) => {
	const sections = document.querySelectorAll(".bitcoin-rate");

	// If section with rate not exist - exit from function.
	if (!sections.length) {
		return false;
	}

	sections.forEach((section) => {
		const currenciesArr = Object.entries(currencyRates);

		currenciesArr.forEach((arr, index) => {
			const [key, value] = arr;

			// Get field of section for key
			const currencyField = section.querySelector(
				".bitcoin-rate-item--" +
					key.toLowerCase() +
					" .bitcoin-rate-item-value",
			);

			// New value
			const rateFloat = roundNumber(value.rate_float);

			// Do nothing if field has '...' value before.
			if (currencyField.innerText != "...") {
				// If new value less than old - add 'down' class or if it more than old - add class 'up'.
				if (currencyField.innerText > rateFloat) {
					currencyField.classList.add("down");
				} else if (currencyField.innerText < rateFloat) {
					currencyField.classList.add("up");
				}
			}

			// Paste new value.
			currencyField.innerText = rateFloat;

			// Remove added 'up' or 'down' classes, which added before after 1 sec.
			setTimeout(() => {
				currencyField.classList.remove("down", "up");
			}, 1000);

			const btn = section.querySelector(".bitcoin-rate-fetch");

			// Enable btn - it could be disabled to prevent multiple pending quieries.
			btn.disabled = false;
		});
	});
};

const roundNumber = (number) => {
	// Remove the comma and parse the number
	const parsedNumber = parseFloat(number.toString().replace(/,/g, ""));

	// Round to two decimal places
	const roundedNumber = parsedNumber.toFixed(2);

	// Add back the comma for formatting
	return new Intl.NumberFormat("en-US").format(roundedNumber);
};
