import { Component } from '@angular/core';

@Component({
  selector: 'app-root',
  templateUrl: '<div> {{values}}</div>',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  values = '';
  ngOnInit(){
          this.values = 'twinkle'
  }
  //title = 'angular-project1';
}
