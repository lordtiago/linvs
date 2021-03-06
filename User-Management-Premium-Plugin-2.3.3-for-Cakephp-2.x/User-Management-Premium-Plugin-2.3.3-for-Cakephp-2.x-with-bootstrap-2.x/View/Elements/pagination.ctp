<?php
/*
Cakephp 2.x User Management Premium Version (a product of Ektanjali Softwares Pvt Ltd)
Website- http://ektanjali.com
Plugin Demo- http://umpremium.ektanjali.com
Author- Chetan Varshney (The Director of Ektanjali Softwares Pvt Ltd)
Plugin Copyright No- 11498/2012-CO/L

UMPremium is a copyrighted work of authorship. Chetan Varshney retains ownership of the product and any copies of it, regardless of the form in which the copies may exist. This license is not a sale of the original product or any copies.

By installing and using UMPremium on your server, you agree to the following terms and conditions. Such agreement is either on your own behalf or on behalf of any corporate entity which employs you or which you represent ('Corporate Licensee'). In this Agreement, 'you' includes both the reader and any Corporate Licensee and Chetan Varshney.

The Product is licensed only to you. You may not rent, lease, sublicense, sell, assign, pledge, transfer or otherwise dispose of the Product in any form, on
a temporary or permanent basis, without the prior written consent of Chetan Varshney.

The Product source code may be altered (at your risk)

All Product copyright notices within the scripts must remain unchanged (and visible).

If any of the terms of this Agreement are violated, Chetan Varshney reserves the right to action against you.

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Product.

THE PRODUCT IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE PRODUCT OR THE USE OR OTHER DEALINGS IN THE PRODUCT.
*/

if(!isset($totolText)) {
	$totolText=__('Total Records');
}
?>
<div class="pagination pagination-right">
	<ul>
<?php
		echo "<li><span>".$this->Paginator->counter(array('format' => $totolText.' %count%'))."</span></li>";
		$firstP=$this->Paginator->first(__('First'), array('tag' => 'li'));
		if(!empty($firstP)) {
			echo $firstP;
		} else {
			echo "<li class='disabled'><span>First</span></li>";
		}
		if($this->Paginator->hasPrev()) {
			echo $this->Paginator->prev(__('Previous'), array('tag' => 'li'));;
		} else {
			echo "<li class='disabled'><span>Previous</span></li>";
		}
		echo $this->Paginator->numbers(array('separator'=>'', 'tag' => 'li', 'currentTag'=>'span'));
		if($this->Paginator->hasNext()) {
			echo $this->Paginator->next(__('Next'), array('tag' => 'li'));;
		} else {
			echo "<li class='disabled'><span>Next</span></li>";
		}
		$lastP=$this->Paginator->last(__('Last'), array('tag' => 'li'));
		if(!empty($lastP)) {
			echo $lastP;
		} else {
			echo "<li class='disabled'><span>Last</span></li>";
		}
		echo "<li><span>".$this->Paginator->counter(array('format' => __('Page %s of %s', '%page%', '%pages%')))."</span></li>";
		echo "<li><span style='padding-top: 3px;height:21px;width:21px'>".$this->Html->image(SITE_URL.'usermgmt/img/loading-circle.gif', array('id' => 'busy-indicator', 'style'=>'display:none;'))."</span></li>";
?>
	</ul>
</div>
<?php echo $this->Js->writeBuffer();  ?>