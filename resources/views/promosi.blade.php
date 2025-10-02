@extends('layouts.main')

@section('title', 'Promosi - RAS77')

@section('content')
       <div class="promo-tabs">
    <button type="button" data-tab="promotion" class="promo-tab promo-tab--active">
        <span class="promo-tab__title">Semua Promosi</span>
    </button>
    <button type="button" data-tab="event" class="promo-tab">
        <span class="promo-tab__title">Semua Event Provider</span>
    </button>
</div>

<div class="promo-filters mt-6">
    <div class="promo-filter__select-wrapper">
        <select id="promoFilter" class="promo-filter__select">
            <option value="all">Semua Promosi</option>
            @foreach($categories as $value => $label)
                <option value="{{ $value }}">{{ $label }}</option>
            @endforeach
        </select>
<span class="promo-filter__icon">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="white">
        <path d="M7 10l5 5 5-5z"/>
    </svg>
</span>
    </div>
</div>

        <div class="promo-content mt-1 space-y-12">
            <div class="promo-grid" data-tab-content="promotion">
                @forelse($promotions as $promotion)
                    <article class="promo-card" data-category="{{ $promotion->category }}" data-type="promotion">
                        <div class="promo-card__image">
                            <div class="promo-card__image-inner">
                                @if($promotion->image_url)
                                    <img src="{{ $promotion->image_url }}" alt="{{ $promotion->title }}" loading="lazy">
                                @else
                                    <div class="promo-card__placeholder">
                                        <i class="fas fa-image"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="promo-card__badge">
                                {{ $categories[$promotion->category] ?? ucfirst(str_replace('-', ' ', $promotion->category)) }}
                            </div>
                        </div>
                        <div class="promo-card__body">
                            <h3 class="promo-card__title">{{ $promotion->title }}</h3>
                            <div class="promo-card__actions">
                                <button type="button" class="promo-card__detail" data-toggle="promo-detail">
                                    Lihat Detail
                                    <i class="fas fa-chevron-down ml-2 text-xs transition-transform"></i>
                                </button>
                            </div>
                            @if(!empty($promotion->description))
                                <div class="promo-card__detail-content hidden">
                                    {!! nl2br(e($promotion->description)) !!}
                                </div>
                            @else
                                <div class="promo-card__detail-content hidden text-gray-300">
                                    Info detail promo akan diumumkan segera.
                                </div>
                            @endif
                        </div>
                    </article>
                @empty
                    <div class="promo-empty">
                        <i class="fas fa-bullhorn"></i>
                        <p>Belum ada promosi aktif saat ini. Silakan cek kembali nanti.</p>
                    </div>
                @endforelse
                <div class="promo-empty promo-empty--filter hidden">
                    <i class="fas fa-search"></i>
                    <p>Belum ada promosi yang cocok dengan filter ini.</p>
                </div>
            </div>

            <div class="promo-grid hidden" data-tab-content="event">
                @forelse($events as $event)
                    <article class="promo-card" data-category="{{ $event->category }}" data-type="event">
                        <div class="promo-card__image">
                            <div class="promo-card__image-inner">
                                @if($event->image_url)
                                    <img src="{{ $event->image_url }}" alt="{{ $event->title }}" loading="lazy">
                                @else
                                    <div class="promo-card__placeholder">
                                        <i class="fas fa-image"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="promo-card__badge">
                                {{ $categories[$event->category] ?? ucfirst(str_replace('-', ' ', $event->category)) }}
                            </div>
                        </div>
                        <div class="promo-card__body">
                            <h3 class="promo-card__title">{{ $event->title }}</h3>
                            <div class="promo-card__actions">
                                <button type="button" class="promo-card__detail" data-toggle="promo-detail">
                                    Lihat Detail
                                    <i class="fas fa-chevron-down ml-2 text-xs transition-transform"></i>
                                </button>
                            </div>
                            @if(!empty($event->description))
                                <div class="promo-card__detail-content hidden">
                                    {!! nl2br(e($event->description)) !!}
                                </div>
                            @else
                                <div class="promo-card__detail-content hidden text-gray-300">
                                    Info event provider akan segera hadir.
                                </div>
                            @endif
                        </div>
                    </article>
                @empty
                    <div class="promo-empty">
                        <i class="fas fa-calendar-alt"></i>
                        <p>Belum ada event provider yang tersedia untuk saat ini.</p>
                    </div>
                @endforelse
                <div class="promo-empty promo-empty--filter hidden">
                    <i class="fas fa-search"></i>
                    <p>Belum ada event yang cocok dengan filter ini.</p>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <style>
        .promo-tabs {
    display: flex;
    justify-content: center;
    border-radius: 6px;
    overflow: hidden;
}

..promo-tabs {
    display: flex;
    justify-content: center;
    gap: 0.5rem;
}

.promo-tab {
    padding: 0.5rem 1rem;
    font-size: 0.9rem;
    font-weight: 600;
    color: #fff;
    background: #111;
    border-radius: 4px;
    transition: all 0.25s ease;
}

.promo-tab--active {
    background: #1f1f1f;
    color: #ff9900;
}

.promo-tab:hover {
    background: #222;
    cursor: pointer;
}

.promo-tab__subtitle {
    display: none; /* sembunyikan subtitle */
}
        .promo-filter__select-wrapper {
    position: relative;
    width: 100%;
    max-width: 320px;
    margin: 0 auto;
}

.promo-filter__select-wrapper {
    position: relative;
    width: 100%;
    max-width: 320px;
    margin: 0 auto;
}

.promo-filter__select {
    width: 100%;
    background: #111;
    border: none;
    border-radius: 6px;
    padding: 0.75rem 1rem;
    padding-right: 2.5rem; /* kasih ruang lebih besar */
    color: #fff;
    font-size: 1rem;
    font-weight: 600;
    line-height: 1.2;
    outline: none;
    appearance: none;
}

.promo-filter__icon {
    position: absolute;
    top: 50%;
    right: 0.85rem;
    transform: translateY(-50%);
    display: flex;
    align-items: center;
    justify-content: center;
    pointer-events: none;
}

        .promo-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 1.75rem;
        }

        .promo-card {
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .promo-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 24px 45px rgba(14, 116, 144, 0.25);
        }

        .promo-card__image {
            position: relative;
            padding: 0.9rem;
        }

        .promo-card__image-inner {
            position: relative;
            width: 100%;
            background: rgba(15, 23, 42, 0.85);
            border-radius: 14px;
            overflow: hidden;
        }

        .promo-card__image-inner::before {
            content: '';
            display: block;
            padding-top: 56.25%;
        }

        .promo-card__image img {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: contain;
            background: linear-gradient(135deg, rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.9));
        }

        .promo-card__placeholder {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: rgba(148, 163, 184, 0.6);
            font-size: 2rem;
        }

        .promo-card__badge {
            position: absolute;
            top: 12px;
            left: 12px;
            background: rgba(250, 204, 21, 0.9);
            color: #1f2937;
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 0.18em;
            padding: 0.35rem 0.9rem;
            border-radius: 9999px;
        }

        .promo-card__body {
            padding-left: 1.7rem;
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .promo-card__title {
            font-size: 1.1rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
        }

        .promo-card__actions {
            display: flex;
            justify-content: flex-start;
        }

        .promo-card__detail {
            display: inline-flex;
            align-items: center;
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.15), rgba(0, 0, 0, 0.35));
            padding: 0.45rem 1.3rem;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.16em;
            color: #bfdbfe;
            transition: all 0.25s ease;
        }

        .promo-card__detail:hover {
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.3), rgba(59, 130, 246, 0.55));
            color: #fff;
        }

        .promo-card__detail--open {
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.4), rgba(147, 197, 253, 0.65));
            color: #fff;
        }

        .promo-card__detail-content {
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            padding-top: 1rem;
            font-size: 0.9rem;
            line-height: 1.6;
            color: rgba(226, 232, 240, 0.85);
        }

        .promo-empty {
            grid-column: 1 / -1;
            background: rgba(15, 23, 42, 0.65);
            border: 1px dashed rgba(148, 163, 184, 0.4);
            border-radius: 18px;
            padding: 3rem;
            text-align: center;
            color: rgba(226, 232, 240, 0.7);
        }

        .promo-empty i {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            display: inline-block;
        }

        @media (max-width: 640px) {
            .promo-tab {
            }

            .promo-tab__title {
                font-size: 1.05rem;
            }
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const tabButtons = Array.from(document.querySelectorAll('[data-tab]'));
            const tabContents = Array.from(document.querySelectorAll('[data-tab-content]'));
            const filterSelect = document.getElementById('promoFilter');

            const gridState = tabContents.map(content => ({
                key: content.dataset.tabContent,
                element: content,
                cards: Array.from(content.querySelectorAll('.promo-card')),
                emptyDefault: content.querySelector('.promo-empty:not(.promo-empty--filter)'),
                emptyFilter: content.querySelector('.promo-empty--filter')
            }));

            let activeTab = tabButtons.find(btn => btn.classList.contains('promo-tab--active'))?.dataset.tab
                || tabContents[0]?.dataset.tabContent
                || 'promotion';
            let activeFilter = filterSelect ? filterSelect.value : 'all';

            function updateVisibility() {
                gridState.forEach(({ key, element, cards, emptyDefault, emptyFilter }) => {
                    const isActive = key === activeTab;

                    element.style.display = isActive ? 'grid' : 'none';

                    if (!isActive) {
                        cards.forEach(card => {
                            card.style.display = 'none';
                        });

                        if (emptyDefault) {
                            emptyDefault.style.display = 'none';
                        }

                        if (emptyFilter) {
                            emptyFilter.style.display = 'none';
                        }

                        return;
                    }

                    const matchesTabCards = cards.filter(card => card.dataset.type === activeTab);
                    let visibleCount = 0;

                    matchesTabCards.forEach(card => {
                        const matchesFilter = activeFilter === 'all' || card.dataset.category === activeFilter;
                        const shouldShow = matchesFilter;

                        card.style.display = shouldShow ? '' : 'none';

                        if (shouldShow) {
                            visibleCount++;
                        }
                    });

                    const totalCards = matchesTabCards.length;

                    if (emptyDefault) {
                        emptyDefault.style.display = totalCards === 0 ? '' : 'none';
                    }

                    if (emptyFilter) {
                        const shouldShowFilterEmpty = totalCards > 0 && visibleCount === 0 && activeFilter !== 'all';
                        emptyFilter.style.display = shouldShowFilterEmpty ? '' : 'none';
                    }

                    // Ensure cards that do not belong to the active tab stay hidden
                    cards.forEach(card => {
                        if (card.dataset.type !== activeTab) {
                            card.style.display = 'none';
                        }
                    });
                });
            }

            tabButtons.forEach(button => {
                button.addEventListener('click', () => {
                    activeTab = button.dataset.tab;
                    tabButtons.forEach(btn => {
                        btn.classList.toggle('promo-tab--active', btn === button);
                    });
                    updateVisibility();
                });
            });

            if (filterSelect) {
                filterSelect.addEventListener('change', () => {
                    activeFilter = filterSelect.value;
                    updateVisibility();
                });
            }

            document.querySelectorAll('[data-toggle="promo-detail"]').forEach(button => {
                button.addEventListener('click', () => {
                    const detail = button.closest('.promo-card__body').querySelector('.promo-card__detail-content');
                    const icon = button.querySelector('i');
                    const isHidden = detail.classList.contains('hidden');

                    detail.classList.toggle('hidden');
                    button.classList.toggle('promo-card__detail--open', isHidden);

                    if (icon) {
                        icon.classList.toggle('rotate-180', isHidden);
                    }
                });
            });

            updateVisibility();
        });
    </script>
@endpush
