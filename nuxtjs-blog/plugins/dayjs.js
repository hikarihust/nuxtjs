import dayjs from 'dayjs';
import relativeTime from 'dayjs/plugin/relativeTime';
import localeVi from 'dayjs/locale/vi';

dayjs.locale(localeVi);
dayjs.extend(relativeTime);

export default function(options, inject) {
  inject('dayjs', dayjs);
}
