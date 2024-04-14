/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __ } from "@wordpress/i18n";

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import {
	useBlockProps,
	RichText,
	InspectorControls,
	MediaUpload,
} from "@wordpress/block-editor";

import {
	PanelBody,
	PanelRow,
	TextControl,
	CheckboxControl,
	ToggleControl,
	Button,
} from "@wordpress/components";

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import "./editor.scss";

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {Element} Element to render.
 */
export default function Edit({ attributes, setAttributes }) {
	return (
		<>
			<InspectorControls>
				<PanelBody title="Mailchimp" initialOpen={false}>
					<PanelRow>
						<TextControl
							label="List ID (Audience ID)"
							value={attributes.list_id}
							onChange={(list_id) => setAttributes({ list_id })}
						/>
					</PanelRow>

					<PanelRow>
						<ToggleControl
							label="Double opt in"
							checked={attributes.doubleoptin}
							onChange={() =>
								setAttributes({ doubleoptin: !attributes.doubleoptin })
							}
						/>
					</PanelRow>
				</PanelBody>

				<PanelBody title="Image" initialOpen={true}>
					<MediaUpload
						title="Select your image"
						allowedTypes={["image/jpeg", "image/png"]}
						value={attributes.image.id}
						onSelect={(image) =>
							setAttributes({ image: { id: image.id, url: image.url } })
						}
						render={({ open }) => {
							if (0 === attributes.image.id) {
								return (
									<Button variant="secondary" onClick={open}>
										Select image
									</Button>
								);
							} else {
								return (
									<>
										<img src={attributes.image.url} onClick={open} />
										<Button
											variant="link"
											isDestructive
											onClick={(image) =>
												setAttributes({ image: { id: 0, url: "" } })
											}
										>
											Delete image
										</Button>
									</>
								);
							}
						}}
					/>
				</PanelBody>
			</InspectorControls>
			<div {...useBlockProps()}>
				<div className="bitcoin-rate">
					<RichText
						tagName="h2"
						value={attributes.title}
						placeholder="Enter title..."
						allowedFormats={[]}
						onChange={(title) => setAttributes({ title })}
						className="bitcoin-rate-title"
					/>
					<div className="bitcoin-rate-row">
						<p>Here will be rates of usd, gbp, eur</p>
					</div>
					<RichText
						tagName="button"
						value={attributes.btn}
						placeholder="Enter btn..."
						allowedFormats={[]}
						onChange={(btn) => setAttributes({ btn })}
						className="bitcoin-rate-fetch"
					/>
					<div>
						<img src={attributes.image.url} alt={attributes.image.alt} />
					</div>
				</div>
			</div>
		</>
	);
}
