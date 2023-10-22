/* eslint-disable */

export default function (
  action,
  category = 'click event',
  label = 'clicked',
  value = 1,
) {
  let appGaEnabled = false; // eslint-disable-line
  if (appGaEnabled) {
    this.$gtag.event(action, {
      event_category: category,
      event_label: label,
      value: value,
    });
  }
}
