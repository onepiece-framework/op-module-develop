
/** op-module-develop:/markdown.js
 *
 * @created   2023-01-20
 * @version   1.0
 * @package   op-module-develop
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */
//	...
document.addEventListener('DOMContentLoaded', function(){
	//	...
	if( typeof marked !== 'undefined' ){
		//	..
		let codes = document.querySelectorAll('div.markdown');
		for(let code of codes){
			code.innerHTML = marked.parse(code.innerText);
		}
	}

	//	Apply syntax highlighting.
	if( typeof hljs !== 'undefined' ){
		//	...
		document.querySelectorAll('pre code').forEach((code) => {
			//	Do highlight for each code tag.
			hljs.highlightElement(code);
			//	Add class.
			['literal','keyword','title'].forEach((type) => {
				code.querySelectorAll('span.hljs-'+type).forEach((dom) => {
					dom.classList.add(dom.innerText);
				});
			});
		});
	};
});