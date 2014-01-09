<?php

namespace Kmd\Pagination;

class BootstrapPresenter extends \Illuminate\Pagination\BootstrapPresenter
{
    /**
     * Render the Bootstrap pagination contents.
     *
     * @return string
     */
    public function render()
    {
        // The hard-coded thirteen represents the minimum number of pages we need to
        // be able to create a sliding page window. If we have less than that, we
        // will just render a simple range of page links insteadof the sliding.
        if ($this->lastPage < 13) {
            $content = $this->getPageRange(1, $this->lastPage);
        } else {
            $content = $this->getPageSlider();
        }

        if (\Config::get('pagination::show_first_last') === true) {
            return $this->getFirst().$this->getPrevious().$content.$this->getNext().$this->getLast();
        }

        return $this->getPrevious().$content.$this->getNext();
    }

    /**
     * Get the previous page pagination element.
     *
     * @param  string  $text
     * @return string
     */
    public function getPrevious($text = null)
    {
        $text = \Config::get('pagination::slider.prev_link_text', $text);
        $class = \Config::get('pagination::align_simple') ? 'previous' : '';
        // If the current page is less than or equal to one, it means we can't go any
        // further back in the pages, so we will render a disabled previous button
        // when that is the case. Otherwise, we will give it an active "status".
        if ($this->currentPage <= 1) {
            $class = ltrim($class . ' ') . 'disabled';
            return '<li class="'.$class.'"><span>'.$text.'</span></li>';
        } else {
            $url = $this->paginator->getUrl($this->currentPage - 1);
            return '<li class="'.$class.'"><a href="'.$url.'">'.$text.'</a></li>';
        }
    }

    /**
     * Get the next page pagination element.
     *
     * @param  string  $text
     * @return string
     */
    public function getNext($text = null)
    {
        $text = \Config::get('pagination::slider.next_link_text', $text);
        $class = \Config::get('pagination::align_simple') ? 'next' : '';
        // If the current page is greater than or equal to the last page, it means we
        // can't go any further into the pages, as we're already on this last page
        // that is available, so we will make it the "next" link style disabled.
        if ($this->currentPage >= $this->lastPage) {
            $class = ltrim($class . ' ') . 'disabled';
            return '<li class="'.$class.'"><span>'.$text.'</span></li>';
        } else {
            $url = $this->paginator->getUrl($this->currentPage + 1);
            return '<li class="'.$class.'"><a href="'.$url.'">'.$text.'</a></li>';
        }
    }

    /**
     * Get the first page pagination element.
     *
     * @param  string  $text
     * @return string
     */
    public function getFirst($text = null)
    {
        $text = \Config::get('pagination::slider.first_link_text', $text);
        // If the current page is less than or equal to one, it means we can't go any
        // further back in the pages, so we will render a disabled previous button
        // when that is the case. Otherwise, we will give it an active "status".
        if ($this->currentPage <= 1) {
            return '<li class="disabled"><span>'.$text.'</span></li>';
        } else {
            $url = $this->paginator->getUrl(1);
            return '<li><a href="'.$url.'">'.$text.'</a></li>';
        }
    }

    /**
     * Get the last page pagination element.
     *
     * @param  string  $text
     * @return string
     */
    public function getLast($text = null)
    {
        $text = \Config::get('pagination::slider.last_link_text', $text);
        // If the current page is greater than or equal to the last page, it means we
        // can't go any further into the pages, as we're already on this last page
        // that is available, so we will make it the "next" link style disabled.
        if ($this->currentPage >= $this->lastPage) {
            return '<li class="disabled"><span>'.$text.'</span></li>';
        } else {
            $url = $this->paginator->getUrl($this->lastPage);
            return '<li><a href="'.$url.'">'.$text.'</a></li>';
        }
    }
}
