const monthsShort = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
const monthsLong = ["January", "Febuary", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
const daysShort = ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"]
const daysLong = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];

function formatDate(date, pattern) {
  pattern = pattern.replace('[date]', '[Y]-[mm]-[dd]');
  pattern = pattern.replace('[time]', `${padNumber(date.getHours(), 2)}:${padNumber(date.getMinutes(), 2)}`);
  pattern = pattern.replace('[time12]', `${date.getHours() % 12 === 0 ? 12 : date.getHours() % 12}:${padNumber(date.getMinutes(), 2)}`);
  pattern = pattern.replace('[ampm]', date.getHours() < 12 ? 'am' : 'pm');
  pattern = pattern.replace('[y]', date.getFullYear().toString().substring(2,4));
  pattern = pattern.replace('[Y]', date.getFullYear());
  pattern = pattern.replace('[m]', date.getMonth() + 1);
  pattern = pattern.replace('[mm]', padNumber(date.getMonth() + 1, 2));
  pattern = pattern.replace('[M]', monthsShort[date.getMonth()]);
  pattern = pattern.replace('[MM]', monthsLong[date.getMonth()]);
  pattern = pattern.replace('[d]', date.getDate());
  pattern = pattern.replace('[dd]', padNumber(date.getDate(), 2));
  pattern = pattern.replace('[dow]', daysShort[date.getDay() - 1]);
  pattern = pattern.replace('[DOW]', daysLong[date.getDay() - 1]);
  return pattern;
}

function padNumber(num, numOfDigits) {
  return num.toLocaleString('en-US', {
    minimumIntegerDigits: numOfDigits,
    useGrouping: false
  });
}