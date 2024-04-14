/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { useBlockProps, RichText } from "@wordpress/block-editor";

/**
 * The save function defines the way in which the different attributes should
 * be combined into the final markup, which is then serialized by the block
 * editor into `post_content`.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#save
 *
 * @return {Element} Element to render.
 */
export default function save({ attributes }) {
	const currencies = ["usd", "gbp", "eur"];

	return (
		<div {...useBlockProps.save()}>
			<div className="bitcoin-rate">
				<RichText.Content tagName="h2" value={attributes.title} />
				<div className="bitcoin-rate-row">
					{currencies.map((currency, i) => (
						<div
							key={i}
							className={`bitcoin-rate-item bitcoin-rate-item--${currency}`}
						>
							<span className="bitcoin-rate-item-value">...</span>
							<span className="bitcoin-rate-item-currency">
								{currency.toUpperCase()}
							</span>
						</div>
					))}
				</div>
				<RichText.Content
					className="bitcoin-rate-fetch"
					tagName="button"
					value={attributes.btn}
				/>
				<input
					type="hidden"
					name="opt_in"
					value={attributes.doubleoptin ? "yes" : "no"}
				/>
				<div>
					<img src={attributes.image.url} alt={attributes.image.alt} />
				</div>
			</div>
		</div>
	);
}
