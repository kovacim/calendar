<?php
/**
 * ownCloud - Calendar App
 *
 * @author Raghu Nayyar
 * @author Georg Ehrke
 * @copyright 2014 Raghu Nayyar <beingminimal@gmail.com>
 * @copyright 2014 Georg Ehrke <oc.list@georgehrke.com>
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 *
 */
?>

<ul class="app-navigation-list subscription-list">
	<li ng-repeat="calendar in calendars | orderBy:['order'] | eventFilter | subscriptionFilter"
		ng-class="{
			active: calendar.enabled,
			updating: currentload
		}">
		<span class="calendarCheckbox" style="background-color:{{ calendar.color }}"></span>
		<span class="loadingicon" ng-class="{ hide: !is.loading }">
			<i class="fa fa-spinner fa-spin"></i>
		</span>
		<a href="#/" ng-click="triggerCalendarEnable(calendar.id)" data-id="{{ calendar.id }}">
			<span>{{ calendar.displayname }}</span>
		</a>
		<span class="utils">
			<span class="action" ng-class="{ disabled: !calendar.cruds.share }">
				<span
					id="chooseCalendar-share" 
					class="share icon-share permanent"
					data-item-type="subscription"
					data-item=""
					data-possible-permissions=""
					title="Share Calendar">
				</span>
			</span>
			<span class="action">
				<span 
					class="chooseCalendar-showCalDAVURL"
					data-user="{{ calendar.ownwerid }}"
					data-caldav=""
					title="CalDav Link"
					class="icon-public permanent"
					ng-click="toggleCalDAV($index,calendar.uri,calendar.id)">
				</span>
			</span>
			<span class="action">
				<span
					class="calendarlist-icon download"
					title="Download"
					class="icon-download"
					ng-click="download(calendar.id)">
				</span>
			</span>
			<span class="action">
				<span class="calendarlist-icon edit"
					data-id="{{ calendar.uri }}"
					title="Edit"
					class="icon-rename">
				</span>
			</span>
			<span class="action">
				<span href="#"
					class="calendarlist-icon delete"
					data-id="{{ calendar.uri }}"
					title="Delete"
					class="icon-delete"
					ng-click="delete(calendar.id)">
				</span>
			</span>
		</span>
		<fieldset ng-show="caldavfieldset" class="caldavURL">
			<input class="app-navigation-input" type="text" ng-model="calDAVmodel" data-id="{{ calendar.id }}" readonly />
			<button id="chooseCalendar-close" class="primary" ng-click="caldavfieldset = !caldavfieldset;">
				<span class="icon-view-previous"></span>
			</button>
		</fieldset>
	</li>
</ul>