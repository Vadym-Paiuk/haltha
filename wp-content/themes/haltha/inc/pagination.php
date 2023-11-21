<?php
	function show_pagination( $foundPosts, $perPage = 1, $currentPage = 1 ) {
		$arroundPage = 2;
		$foundPosts  = (int) $foundPosts;
		$perPage     = (int) $perPage;
		
		if ( $perPage >= $foundPosts ) {
			$html = '<input type="hidden" name="page" value="1">';
			$html .= '<input type="hidden" name="pagination" value="false">';
			
			echo $html;
			return;
		}
		
		$pages = (int) ceil( $foundPosts / $perPage );
		$page  = (int) $currentPage;
		$prev  = $page - 1;
		$next  = $page + 1;
		
		$html = '<input type="hidden" name="page" value="' . $currentPage . '">';
		$html .= '<input type="hidden" name="pagination" value="false">';
		$html .= '<nav class="pagination-links">';
		
		if ( $page !== 1 ) {
			$html .= '<span class="pagination-link prev" data-page="' . $prev . '"></span>';
		}
		
		if ( ( $arroundPage * 2 + 1 ) >= $pages ) {
			
			for ( $i = 1; $i <= $pages; $i ++ ) {
				if ( $i === $page ) {
					$html .= '<span class="pagination-link current">' . $i . '</span>';
				} else {
					$html .= '<span class="pagination-link" data-page="' . $i . '">' . $i . '</span>';
				}
			}
			
		} else {
			
			if ( $page <= ( $arroundPage + 2 ) ) {
				
				for ( $i = 1; $i <= ( $page + $arroundPage ); $i ++ ) {
					if ( $i === $page ) {
						$html .= '<span class="pagination-link current">' . $i . '</span>';
					} else {
						$html .= '<span class="pagination-link" data-page="' . $i . '">' . $i . '</span>';
					}
				}
				
				$html .= '<span class="pagination-link pagination-link--dots">...</span>';
				
				$html .= '<span class="pagination-link" data-page="' . $pages . '">' . $pages . '</span>';
			}
			
			if ( ( $arroundPage + 2 ) < $page && $page < ( $pages - ( $arroundPage + 1 ) ) ) {
				
				$html .= '<span class="pagination-link" data-page="1">1</span>';
				
				$html .= '<span class="pagination-link pagination-link--dots">...</span>';
				
				for ( $i = $page - $arroundPage; $i <= $page + $arroundPage; $i ++ ) {
					if ( $i === $page ) {
						$html .= '<span class="pagination-link current">' . $i . '</span>';
					} else {
						$html .= '<span class="pagination-link" data-page="' . $i . '">' . $i . '</span>';
					}
				}
				
				$html .= '<span class="pagination-link pagination-link--dots">...</span>';
				
				$html .= '<span class="pagination-link" data-page="' . $pages . '">' . $pages . '</span>';
				
			}
			
			if ( $page >= ( $pages - ( $arroundPage + 1 ) ) ) {
				
				$html .= '<span class="pagination-link" data-page="1">1</span>';
				
				$html .= '<span class="pagination-link pagination-link--dots">...</span>';
				
				for ( $i = ( $page - $arroundPage ); $i <= $pages; $i ++ ) {
					if ( $i === $page ) {
						$html .= '<span class="pagination-link current">' . $i . '</span>';
					} else {
						$html .= '<span class="pagination-link" data-page="' . $i . '">' . $i . '</span>';
					}
				}
				
			}
			
		}
		
		if ( $page !== $pages && $perPage !== - 1 ) {
			$html .= '<span class="pagination-link next" data-page="' . $next . '"></span>';
		}
		
		$html .= '</nav>';
		
		echo $html;
		
	}