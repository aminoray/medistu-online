'use strict';

{
  // ここから
  const detail_open = document.getElementById('detail-open');
  const detail_close = document.getElementById('detail-close');
  const detail_modal = document.getElementById('detail-modal');
  const mask = document.getElementById('mask');

  detail_open.addEventListener('click', () => {
    detail_modal.classList.remove('hidden');
    mask.classList.remove('hidden');
  });

  detail_close.addEventListener('click', () => {
    detail_modal.classList.add('hidden');
    mask.classList.add('hidden');
  });

  mask.addEventListener('click', () => {
    detail_close.click();
  });

  // ここまで
}
